-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2022-01-09 05:55:56
-- 服务器版本： 5.7.31
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `lease_handbags`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT '管理员号',
  `name` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '管理员姓名',
  `passwd` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='管理员表';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `passwd`) VALUES
(1, 'admin', '8ddcff3a80f4189ca1c9d4d902c3c909');

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '证件号',
  `cardtype` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '证件类型',
  `cname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '客户姓名',
  `csex` char(1) COLLATE utf8_bin NOT NULL COMMENT '客户性别',
  PRIMARY KEY (`cardid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顾客表';

-- --------------------------------------------------------

--
-- 表的结构 `handbags`
--

DROP TABLE IF EXISTS `handbags`;
CREATE TABLE IF NOT EXISTS `handbags` (
  `bagid` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '手袋编码',
  `designer` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '设计师',
  `type` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '手袋类型',
  `color` varchar(55) COLLATE utf8_bin NOT NULL COMMENT '手袋颜色',
  `birth` int(10) NOT NULL COMMENT '上市日期',
  `status` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否已租赁',
  `price` int(6) NOT NULL COMMENT '租赁价格（元/天）',
  `remarks` varchar(1000) COLLATE utf8_bin DEFAULT NULL COMMENT '特点描述',
  PRIMARY KEY (`bagid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='总信息表';

--
-- 转存表中的数据 `handbags`
--

INSERT INTO `handbags` (`bagid`, `designer`, `type`, `color`, `birth`, `status`, `price`, `remarks`) VALUES
('A00001', 'BVLGARI', '多功能包', '红色', 2022, '否', 20, '此款SERPENTI CABOCHON MAXI CHAIN系列小号斜挎包，采用柔软的紫红石榴石红色小牛皮材质，饰有超大马特拉塞凸纹图案，灵感源自凸形蛋面切割宝石的光滑表面，巧妙糅合大胆几何图案与精美细节。作品搭配的链条肩带亦可作为手柄使用，令人联想到BULGARI宝格丽声名远扬的珠宝作品大胆不羁的风格，同时装饰镶嵌宝石的经典蛇首搭扣，灵感源自1960年代的一枚BULGARI宝格丽腕表。搭配皮革肩带，单个隔层，一个敞口口袋，一个内部拉链口袋，一个卡位和一个镌刻BULGARI宝格丽品牌标识的内侧金属铭牌。22.5 X 15 X 10 厘米 - 8.9 X 5.9 X 3.9 英寸。意大利制造。'),
('A00002', 'BVLGARI', '单肩包', '白色', 2022, '否', 25, '此款SERPENTI FOREVER DIAMOND BLAST系列小号肩包采用象牙蛋白石色阳光绗缝小羊皮材质，饰以迷人的的马特拉塞凸纹图案，并从BULGARI宝格丽古董时计的太阳射线纹饰表盘中汲取灵感，彰显前卫的设计风格。作品搭配“GOURMETTE”（链条式）粗链和皮革肩带，饰以标志性蛇首搭扣，其魅惑迷人的鳞片和设计从1960年代的SERPENTI系列珠宝作品中汲取灵感，适合日常佩戴。设有单个隔层，一个内部拉链口袋，一个配可个性化定制化妆镜的镜袋，一个镌刻BULGARI宝格丽品牌标识的内侧金属铭牌，背面饰BULGARI宝格丽金属标识。24 X 15 X 7 厘米 - 9.5 X 5.9 X 2.8 英寸。意大利制造。'),
('A00003', 'BVGARI', '手提包', '橙色', 2022, '否', 20, '此款SERPENTI FOREVER系列小号手提包采用珊瑚玛瑙橙色小牛皮材质，将现代风格与多变魅力巧妙结合。作品搭配蛇形链条与皮革肩带，饰以标志性蛇首搭扣，其魅惑迷人的鳞片与设计从1960年代的SERPENTI系列珠宝中汲取灵感。设有三个隔层，一个背面外置拼接口袋，一个内部敞口口袋，一个配可个性化定制化妆镜的镜袋，背面饰BULGARI宝格丽金属标识。18 X 15 X 11 厘米 - 7.1 X 5.9 X 4.3 英寸。意大利制造。'),
('A00004', 'BVGARI', '手提包', '金色', 2022, '否', 35, '这款迷人的SERPENTI FOREVER系列金色激光切割小牛皮斜挎包，以微型化手法忠实演绎同名经典款式，搭配浅金镀金黄铜配饰，以紧凑比例和精湛工艺重新诠释此标志性作品的魅力。包袋设计从BVLGARI宝格丽古董时计的太阳射线纹饰表盘中汲取灵感，饰以渐变镂空圆点图案，以标志性蛇首搭扣为中心，饰以缎光金色鳞片，点缀迷人的黑色缟玛瑙双眼。设有两个隔层，一个可调节蛇形链条肩带，可肩背或斜挎，一个配菱形化妆镜的镜袋，一个内置BVLGARI宝格丽品牌标识金属铭牌，背面饰BVLGARI宝格丽金属标识。线上独售。16.5 X 11 X 5 厘米 - 6.5 X 4.3 X 2 英寸。意大利制造。'),
('A00005', 'BVLGARI', '斜挎包', '绿色', 2022, '否', 23, '全新“SERPENTI FOREVER”系列斜挎包彰显都市风格，时尚多变，为SERPENTI世界增添别具一格的潮流时尚感。此款包袋采用鲜绿色小牛皮材质，搭配浅金镀金黄铜配饰。黑色和白玛瑙色珐琅和绿色孔雀石感性双眼，将经典蛇首搭扣点缀得魅惑迷人。可调节的蛇形链条和皮革肩带，轻松配搭时尚日装。小号，两个口袋，一面小化妆镜。一个不可拆卸的信用卡夹，一个敞口口袋，一个拉链口袋和两个外部口袋。19 X 13 X 7厘米 - 7.5 X 5.1 X 2.8英寸'),
('A00006', 'BVLGARI', '斜挎包', '粉红色', 2022, '否', 28, '此款“SERPENTI CABOCHON”系列斜挎包采用别具魅力的大号图形图案和大胆的金属质感细节，以精致实用的独特设计和现代风格绽放SERPENTI世界璀璨光芒。大号马特拉塞凸纹几何图案从凸形蛋面切割宝石的迷人表面汲取灵感，使得此款包袋的淡粉石英粉色小牛皮包身更显柔软顺滑。镀金黄铜SERPENTI蛇首搭扣，从1960年代的BVLGARI宝格丽古董腕表中汲取灵感，中间处饰以小巧的粉红色珍珠母贝蛇鳞，点缀红色珐琅双眸，尽显新意。经典BVLGARI宝格丽链条，如项链般装饰翻盖，亦可用作精美提手，尽显珠宝品牌BVLGARI宝格丽的设计精髓。此款手袋配备可调节和可拆卸的皮革肩带，可用作手提包或手拿包，实现多变百搭功能，日夜皆宜。小号，设一个收纳层，一个内部拉链口袋和一个内部敞口口袋。镌刻BVLGARI宝格丽品牌标识的内侧金属铭牌。22.5 X 15 X 10 厘米 - 8.9 X 5.9 X 3.9 英寸'),
('A00007', 'BVLGARI', '单肩包', '蓝色', 2022, '否', 28, '全新SERPENTI ELLIPSE系列中号肩包以独特的造型、标志性细节及多变魅力，为SERPENTI FOREVER世界增添时尚气息。这款日常包袋采用尼亚加拉蓝宝石蓝色小牛皮精制而成，包身为都市粒纹小牛皮材质，两侧为光滑质感小牛皮，搭配镀金黄铜配饰，迷人的经典蛇首中央点缀黑色缟玛瑙鳞片和红色珐琅双眼，正面磁扣隐藏其下。设有单个隔层，可调节链条和皮革肩带，以及可拆卸皮革手柄，既可斜挎，亦可作为经典肩包佩戴。实用的顶部拉链，设有三个内部口袋，背面设一个外置口袋和BVLGARI宝格丽金属标识。25.5 X 25 X 5.5 厘米 - 10 X 9.8 X 2.2 英寸。意大利制造。'),
('B00001', 'PRADA', '手提包', '紫色', 2021, '否', 20, '这款Re-Edition 2000手袋通体覆以亮片，于表面营造光影格调和虹彩炫色，是对Prada标志性风格配饰的新颖重释。手袋选用创新性Re-Nylon再生尼龙打造。该面料通过提纯海洋塑料回收物、渔网和织物纤维制成。手袋配有拉链拉合和编织饰带提手。别出心裁的涂珐琅三角形金属徽标，彰显品牌格调。'),
('B00002', 'PRADA', '单肩包', '绿色', 2021, '否', 30, '这款Prada Double中号手袋采用Saffiano皮革制成。配有双提手、可拆卸肩带和软羊革衬里，搭配金色配件和Prada徽标。'),
('B00003', 'PRADA', '单肩包', '黑色', 2021, '否', 23, '这款精致而摩登的Prada Cleo手袋焕新重释品牌标志性的设计，通体亮面装饰营造华丽观感。底部和侧面别致的倾斜结构彰显HOBO式包身简约的弧形线条，赋予其轻柔外观。正面刺绣刻字徽标巧妙装点，平添现代气息。'),
('C00001', 'COACH', '晚装包', '棕色', 2020, '否', 15, 'Beat手袋的设计灵感源自纽约的律动，妥善胜任出行需求。 通用的设计既可作为手拿包，也可用优雅链带进行短肩背或用可拆卸长肩带来斜挎。 采用精制皮革、经典标志帆布和结实涂层帆布制作，饰有标志性马车图案，配备两个大收纳性隔层、一个拉链袋和一个由Coach带扣组成的安全搭扣。'),
('C00002', 'COACH', '手提包', '卡其色', 2021, '否', 18, '包如其名的Rogue手袋的灵感源自不羁者、反叛者和梦想家，采用鹅卵石纹皮革、棒球手套鞣制皮革和纳帕皮革制作，当属便携百搭的包款。 39号手袋作为Rogue系列中大号的包款，可存放一台13寸笔记本电脑。 配备两个开放式隔层、一个安全内置拉链隔层以及多个多功能口袋，饰有Coach的动物元素，致敬了美好的大自然与奇妙的日常生活。'),
('D00001', 'BURBERRY', '斜挎包', '黑色', 2022, '否', 23, '精巧的斜背包，选用粒纹皮革与 Vintage 复古格纹打造，设有徽标镌刻按扣。搭配可拆式背带，点缀提花精纺的品牌徽标。随心打造斜背、肩背或手拿包造型。'),
('E00002', 'LOUIS VUITTON', '晚装包', '粉色', 2021, '否', 21, 'Pochette Coussin 链条包继承 Coussin 手袋的设计精髓，在 2021 春夏秀场中大放异彩。蓬松软羊皮革包身饰有 Monogram 压纹图案，小巧玲珑，可为任意造型注入新潮魅力。 可手持、别于腰间或借助可拆卸包链背于肩头，携带个人必备品的理想之选。');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单流水号',
  `bagid` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '手袋编码',
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '客户标识',
  `starttime` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '租赁时间',
  `endtime` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '归还时间',
  `linkman` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `ostatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否网上预订',
  `oremarks` char(1) COLLATE utf8_bin DEFAULT '否' COMMENT '订单是否完成',
  PRIMARY KEY (`orderid`),
  KEY `FK_ORDER` (`bagid`),
  KEY `FK_RECORD` (`cardid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='订单入住表';

-- --------------------------------------------------------

--
-- 表的结构 `record`
--

DROP TABLE IF EXISTS `record`;
CREATE TABLE IF NOT EXISTS `record` (
  `orderid` int(8) NOT NULL AUTO_INCREMENT COMMENT '订单流水号',
  `bagid` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '手袋编号',
  `cardid` varchar(25) COLLATE utf8_bin NOT NULL COMMENT '客户标识',
  `cardtype` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '证件类型',
  `cname` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '客户姓名',
  `csex` char(1) COLLATE utf8_bin NOT NULL COMMENT '客户性别',
  `starttime` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '租赁时间',
  `endtime` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '归还时间',
  `linkman` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `ostatus` char(1) COLLATE utf8_bin NOT NULL DEFAULT '否' COMMENT '是否网上预订',
  `monetary` decimal(8,2) DEFAULT NULL COMMENT '消费金额',
  `oremarks` char(1) COLLATE utf8_bin DEFAULT NULL COMMENT '订单是否完成',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='订单入住历史表';

--
-- 转存表中的数据 `record`
--

INSERT INTO `record` (`orderid`, `bagid`, `cardid`, `cardtype`, `cname`, `csex`, `starttime`, `endtime`, `linkman`, `phone`, `ostatus`, `monetary`, `oremarks`) VALUES
(14, 'A00001', '440000200201012222', '身份证', '黄炫清', '女', '20220108', '20220108', '黄炫清', '15917871270', '是', '20.00', '是'),
(18, 'B00001', '440722200201202222', '身份证', 'Jenny', '女', '20220108', '20020109', 'Jenny', '15917888888', '是', '-146060.00', '是');

--
-- 限制导出的表
--

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_RECORD` FOREIGN KEY (`cardid`) REFERENCES `customer` (`cardid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
