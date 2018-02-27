INSERT INTO `oxuser` (`OXID`,     `OXACTIVE`, `OXRIGHTS`, `OXSHOPID`,    `OXUSERNAME`,         `OXPASSWORD`,                       `OXPASSSALT`,        `OXCUSTNR`, `OXUSTID`, `OXCOMPANY`,             `OXFNAME`,                 `OXLNAME`,      `OXSTREET`,         `OXSTREETNR`, `OXADDINFO`,                `OXCITY`,            `OXCOUNTRYID`,                `OXZIP`, `OXFON`, `OXFAX`, `OXSAL`, `OXBONI`, `OXCREATE`,            `OXREGISTER`,          `OXPRIVFON`, `OXMOBFON`, `OXBIRTHDATE`, `OXURL`, `OXUPDATEKEY`, `OXUPDATEEXP`) VALUES
                     ('testuser',  1,         'user',      'oxbaseshop', 'testing_account@oxid-esales.dev', 'c9dadd994241c9e5fa6469547009328a', '7573657275736572',   8,         '',        '', 'Testing user first name', 'Testing user last name', 'Musterstr.', '1',          'Testing acc for Selenium', 'Musterstadt', 'a7c40f631fc920687.20179984', '79098', '',      '',      'MR',    500,      '2008-02-05 14:42:42', '2008-02-05 14:42:42', '',          '',         '0000-00-00',  '',      '',            0);

INSERT INTO `oxratings` (`OXID`,`OXSHOPID`,`OXUSERID`,`OXTYPE`,`OXOBJECTID`,`OXRATING`,`OXTIMESTAMP`) VALUES
('8dcdd46ac5d720e60e95f058cdd95fb9','oxbaseshop','testuser','oxarticle','f4fe052346b4ec271011e25c052682c5',4,'2018-04-04 09:57:40'),
('1d56e177b8f1eeb3e61c6d0a4a6dfe89','oxbaseshop','testuser','oxarticle','d86e244c8114c8214fbf83da8d6336b3',5,'2018-04-04 10:23:51'),
('df7385814d49da7881f2061b5db9b6ca','oxbaseshop','testuser','oxarticle','f4fc98f99e3660bd2ecd7450f832c41a',1,'2018-04-04 10:24:04'),
('944a79c9b11fed238e679da85d0c6ee3','oxbaseshop','testuser','oxarticle','05848170643ab0deb9914566391c0c63',4,'2018-04-04 10:25:27'),
('44f849b707ab5d8d886cf7954ef71050','oxbaseshop','testuser','oxarticle','10002696d80479437dda4882c77b3bd8',2,'2018-04-04 10:25:50'),
('ea00f3394fccb0c53d2cdd86bb66473f','oxbaseshop','testuser','oxarticle','oiaa81b5e002fc2f73b9398c361c0b97',3,'2018-04-04 10:26:41'),
('d6df275f54b4be71a47c1dd476098e13','oxbaseshop','testuser','oxarticle','6b6efaa522be53c3e86fdb41f0542a8a',2,'2018-04-04 10:27:27'),
('cfeb3861b5c074cd096f6fa408b87f69','oxbaseshop','testuser','oxarticle','fc71f70c3398ee4c2cdd101494087185',5,'2018-04-04 10:28:07');

INSERT INTO `oxreviews` (`OXID`,`OXACTIVE`,`OXOBJECTID`,`OXTYPE`,`OXTEXT`,`OXUSERID`,`OXCREATE`,`OXLANG`,`OXRATING`,`OXTIMESTAMP`) VALUES
('190422848ae7c366504d3402a1acd86f',0,'6b6e2c7af07fd2b9d82223ff35f4e08f','oxarticle','Great','testuser','2018-04-04 10:26:07',1,0,'2018-04-04 10:26:07'),
('86d4612ca58cdc7f959f5457e7667a50',0,'adcb9deae73557006a8ac748f45288b4','oxarticle','Great','testuser','2018-04-04 10:26:25',1,0,'2018-04-04 10:26:25'),
('2fc03441cbbbcc64b409fc56d81d0773',0,'oiaa81b5e002fc2f73b9398c361c0b97','oxarticle','Nice!','testuser','2018-04-04 10:26:41',1,3,'2018-04-04 10:26:41');
