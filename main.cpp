#include <bits/stdc++.h>
using namespace std;
#define inf 0x3f3f3f3f

class edge
{
public:
    int st; //���
    int ed; //�յ�
    int val; //ʣ������
    int pair; //������±�
    edge(){}
    edge(int a, int b, int c, int d)
    {
        st=a;
        ed=b;
        val=c;
        pair=d;
    }
};
int n; //������
int e; //��ʼ����
int src; //Դ��
int dst; //���
int ans; // ���
vector<vector<int> > adj;	// adj[x][i]��ʾ��x�����ĵ�i�����ڱ߼����е��±�
vector<edge> edges;			// �߼���
vector<edge> edges_;		// ԭʼ���� ��Ϊÿ�α�Ҫ���������ظ�����ʱҪ��ʼ����
vector<int> min_flow;		// min_flow[x]��ʾ����㵽x��·������ϸ��
vector<int> father;			// ������
vector<int> level;			// ���
vector<int> cur_arc;		// ��ǰ���Ż�����
vector<int> dis_cnt;		// ���������
vector<int> hyper_flow;		// ��������
//Ford-Fulkerson����
void FF();
//bfs���������·��
bool bfs_augment()
{
    for(int i=0; i<n; i++)
        father[i]=-1;
    for(int i=0; i<n; i++)
        min_flow[i]=inf;
    father[src] = src;
    queue<int> q;
    q.push(src);
    while(!q.empty())
    {
        int x=q.front(),y;
        q.pop();
        if(x==dst)
            return true;
        for(int i=0; i<adj[x].size(); i++)
        {
            edge e = edges[adj[x][i]];
            y = e.ed;
            if(father[y]!=-1 || e.val==0)
                continue;
            father[y] = x;
            min_flow[y] = min(e.val, min_flow[x]);
            q.push(y);
        }
    }
    return false;
}
//����bfs_augment��������father[]����ͼ
void graph_update()
{
    int x, y=dst, flow=min_flow[dst], i;
    ans += flow;
    vector<int> path;
    while(y!=src)// ��������������㲢��;���±�
    {
        path.push_back(y);
        x = father[y];
        for(i=0; i<adj[x].size(); i++)
            if(edges[adj[x][i]].ed==y)
                break;
        edges[adj[x][i]].val -= flow;
        edges[edges[adj[x][i]].pair].val += flow;// ������һ��ı�
        y = x;
    }
}
//Edmonds-Karp�㷨
void EK()
{
    ans = 0;
    while(true)
    {
        if(!bfs_augment())
            break;
        graph_update();
//        for(int i=0; i<edges.size(); i++)
//            cout<<edges[i].st<<" -> "<<edges[i].ed<<" val="<<edges[i].val<<endl;
    }
//    cout<<"�����:"<<ans<<endl;
}
//��α�����ǽڵ����
bool bfs_level()
{
    for(int i=0; i<n; i++)
        level[i]=-1;
    level[src] = 0;
    queue<int> q;
    q.push(src);
    int lv = 0;	// bfs�����
    while(!q.empty())
    {
        lv++;
        int qs = q.size();
        for(int sq=0; sq<qs; sq++)
        {
            int x=q.front(),y;
            q.pop();
            if(x==dst)
                return true;
            for(int i=0; i<adj[x].size(); i++)
            {
                edge e = edges[adj[x][i]];
                y = e.ed;
                if(level[y]!=-1 || e.val==0)
                    continue;
                level[y] = lv;
                q.push(y);
            }
        }
    }
    return false;
}
//��x�ڵ�����flow���� ���ҳ��Է�����ȥ
int dfs_dinic(int x, int flow)
{
    father[x] = 1;
    if(x==dst)
        return flow;
    for(int i=0; i<adj[x].size(); i++)
    {
        edge e = edges[adj[x][i]];
        int y = e.ed;
        if(e.val==0 || level[y]!=level[x]+1 || father[y]==1)
            continue;
        int res = dfs_dinic(y, min(flow, e.val));
        edges[adj[x][i]].val-=res, edges[edges[adj[x][i]].pair].val+=res;
        if(res!=0)
            return res;	// �ҵ�ֱ�ӷ���
    }
    return 0;	// û�ҵ��򷵻�0
}
//Dinic�㷨
void Dinic()
{
    ans = 0;
    while(bfs_level())
    {
        while(true)
        {
            for(int i=0; i<n; i++)
                father[i]=0;
            int res = dfs_dinic(src, inf);
            if(res==0)
                break;	// �Ҳ�������· ��Ҫ����bfs���²��
            ans += res;
        }
    }
}
//����һ���߼��䷴���
void add_edge(int st, int ed, int val)
{
    int ii=edges_.size();
    edges_.push_back(edge(st, ed, val, ii+1));
    edges_.push_back(edge(ed, st, 0, ii));
    adj[st].push_back(ii); adj[ed].push_back(ii+1);
}
//�������ͼ
void load_random_graph(int essay_num, int judge_num, int a, int b)
{
    int st, ed;
    n = 1 + essay_num + essay_num*judge_num + judge_num*a + 1;//������
    cout<<n<<endl;
    adj.resize(n);
    father.resize(n);
    min_flow.resize(n);
    level.resize(n);
    cur_arc.resize(n);
    dis_cnt.resize(n+1);
    hyper_flow.resize(n);
    edges_.clear();
    edges.clear();
    src=0, dst=n-1;
    for(int i=1; i<essay_num+1; i++)
    {
        st=src, ed=i;
        add_edge(st, ed, b);
    }
    for(int i=1; i<essay_num+1; i++)
    {
        for(int j=0; j<judge_num; j++)
        {
            st=i, ed=1+essay_num+essay_num*j+(i-1);
            add_edge(st, ed, 1);
            st=ed;
            vector<int> select(a);
            for(int k=0; k<a/2+1; k++)
            {
                int id = rand()%a;
                if(select[id]==1)
                {
                    k--;
                    continue;
                }
                select[id] = 1;
                ed = 1+essay_num+essay_num*judge_num+a*j+id;
                add_edge(st, ed, 1);
            }
        }
    }
    for(int i=0; i<judge_num*a; i++)
    {
        st=1+essay_num+essay_num*judge_num+i, ed=dst;
        add_edge(st, ed, 1);
    }
    e = edges_.size();
    edges.resize(e);
}
//��ͼ�ָ�ΪĬ�����ɵ�ͼ
void re_graph()
{
    for(int i=0; i<e; i++)
        edges[i]=edges_[i];
}
int main()
{
    double t1=0, t2=0, t3=0;
    clock_t st,ed;
    int a, b;
    cin>>a;
    cin>>b;
    load_random_graph(10, 3, a, b );
    //FF����
    re_graph();
    st = clock();
    FF();
    ed = clock();
    t1 += (double)(ed-st)/CLOCKS_PER_SEC;
    //EK�㷨
    re_graph();
    st = clock();
    EK();
    ed = clock();
    t2 += (double)(ed-st)/CLOCKS_PER_SEC;
    //Dinic��s�㷨
    re_graph();
    st = clock();
    Dinic();
    ed = clock();
    t3 += (double)(ed-st)/CLOCKS_PER_SEC;
    //���ʱ��
    cout<<t1<<endl;
    cout<<t2<<endl;
    cout<<t3<<endl;
    cout << "new branch" << endl;
    cout << "again" << endl;
    cout<<"zhognyijin change it."<<endl;
    
    return 0;
}