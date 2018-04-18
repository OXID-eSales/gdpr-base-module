REPLACE INTO `oxuser`
SET
  `OXID`        = 'oegdprbasetestuser',
  `OXACTIVE`    = 1,
  `OXRIGHTS`    = 'user',
  `OXSHOPID`    = 1,
  `OXUSERNAME`  = 'testing_account@oxid-esales.dev',
  `OXPASSWORD`  = '13d726b9144af35f87b353e86185246fa4dc763f059d01e482d1360765ff3db96ec143df98c14df28b8d9414d40b5f32d090280c7d405a90d27de7f414437d7a',
  `OXPASSSALT`  = '8f9c890adba62e6b8610544792b9eecc',
  `OXCUSTNR`    = 1000,
  `OXFNAME`     = 'FirstName',
  `OXLNAME`     = 'LastName',
  `OXSTREET`    = 'StreetName',
  `OXSTREETNR`  = 'StreetNr',
  `OXZIP`       = '79098',
  `OXCITY`      = 'Freiburg',
  `OXCOUNTRYID` = 'a7c40f631fc920687.20179984',
  `OXCREATE`    = '2000-01-01 00:00:00',
  `OXREGISTER`  = '2000-01-01 00:00:00',
  `OXBIRTHDATE` = '2000-01-01';

REPLACE INTO `oxaddress`
SET
  `OXID`        = 'oegdprbaseaddress1',
  `OXUSERID`    = 'oegdprbasetestuser',
  `OXADDRESSUSERID` = '',
  `OXFNAME`     = 'FirstName',
  `OXLNAME`     = 'LastName',
  `OXSTREET`    = 'StreetName',
  `OXSTREETNR`  = 'StreetNr',
  `OXZIP`       = '79098',
  `OXCITY`      = 'Freiburg',
  `OXCOUNTRYID` = 'a7c40f631fc920687.20179984';

REPLACE INTO `oxaddress`
SET
  `OXID`        = 'oegdprbaseaddress2',
  `OXUSERID`    = 'oegdprbasetestuser',
  `OXADDRESSUSERID` = '',
  `OXFNAME`     = 'FirstName',
  `OXLNAME`     = 'LastName',
  `OXSTREET`    = 'StreetName',
  `OXSTREETNR`  = 'StreetNr',
  `OXZIP`       = '79098',
  `OXCITY`      = 'Freiburg',
  `OXCOUNTRYID` = 'a7c40f631fc920687.20179984';

REPLACE INTO `oxaddress`
SET
  `OXID`        = 'oegdprbaseaddress3',
  `OXUSERID`    = 'oegdprbasetestuser',
  `OXADDRESSUSERID` = '',
  `OXFNAME`     = 'FirstName',
  `OXLNAME`     = 'LastName',
  `OXSTREET`    = 'StreetName',
  `OXSTREETNR`  = 'StreetNr',
  `OXZIP`       = '79098',
  `OXCITY`      = 'Freiburg',
  `OXCOUNTRYID` = 'a7c40f631fc920687.20179984';

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating1',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct1',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating2',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct2',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating3',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct3',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating4',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct4',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating5',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct5',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating6',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct6',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating7',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct7',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating8',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct8',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating9',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct9',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating10',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct10',
  `OXRATING`   = 1;

REPLACE INTO `oxratings`
SET
  `OXID`       = 'oegdprbasetestrating11',
  `OXSHOPID`   = 1,
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXTYPE`     = 'oxarticle',
  `OXOBJECTID` = 'oegdprbasetestproduct11',
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview1',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct1',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview2',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct2',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview3',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct3',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview4',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct4',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview5',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct5',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview6',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct6',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview7',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct7',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxreviews`
SET
  `OXID`       = 'oegdprbasetestreview8',
  `OXACTIVE`   = 1,
  `OXOBJECTID` = 'oegdprbasetestproduct8',
  `OXTYPE`     = 'oxarticle',
  `OXTEXT`     = 'Great',
  `OXUSERID`   = 'oegdprbasetestuser',
  `OXCREATE`   = '2000-01-01 00:00:00',
  `OXLANG`     = 1,
  `OXRATING`   = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct1',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 1',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 1',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct2',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 2',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 2',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct3',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 3',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 3',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct4',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 4',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 4',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct5',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 5',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 5',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct6',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 6',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 6',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct7',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 7',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 7',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct8',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 8',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 8',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct9',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 9',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 9',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct10',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 10',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 10',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;

REPLACE INTO `oxarticles`
SET
  `OXID`           = 'oegdprbasetestproduct11',
  `OXMAPID`        = 902,
  `OXSHOPID`       = 1,
  `OXACTIVE`       = 1,
  `OXACTIVEFROM`   = '2000-01-01 00:00:00',
  `OXACTIVETO`     = '2099-01-01 00:00:00',
  `OXARTNUM`       = '0000001',
  `OXTITLE`        = 'test product 11',
  `OXSHORTDESC`    = '',
  `OXTITLE_1`      = 'test product 11',
  `OXSHORTDESC_1`  = '',
  `OXPRICE`        = 100,
  `OXBLFIXEDPRICE` = 0,
  `OXPRICEA`       = 0,
  `OXPRICEB`       = 0,
  `OXPRICEC`       = 0,
  `OXBPRICE`       = 0,
  `OXPIC1`         = 'nopic.jpg',
  `OXSTOCK`        = 1000,
  `OXINSERT`       = '2018-01-01',
  `OXDELIVERY`     = '2018-01-01',
  `OXORDERINFO`    = '',
  `OXSUBCLASS`     = 'oxarticle',
  `OXSTOCKFLAG`    = 1;
