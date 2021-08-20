-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3308
-- 生成日期： 2021-07-28 08:21:26
-- 服务器版本： 5.7.28
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `pname` varchar(80) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `size` enum('small','medium','large','x-large') NOT NULL,
  `color` enum('white','black','grey','blue','green','yellow','red','pink','purple','khaki','brown','gold','silver') NOT NULL,
  `price` float NOT NULL,
  `made_in` varchar(50) NOT NULL,
  `caption` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `type`, `pname`, `brand`, `size`, `color`, `price`, `made_in`, `caption`) VALUES
(10001, 'ManHat', 'Quiksilver Men\'s Beach Sun Straw Hat', 'Quiksilver', 'medium', 'brown', 19.95, 'Ontario', 'The Pierside hat is constructed from weaved straw, featuring a wide brim, lined headband and adjustable chin strap; The classic lifeguard hat that is perfect for any day at the beach, working in the yard or adventuring outdoors.'),
(10002, 'ManHat', 'BROOKLYN ATHLETICS Men\'s Straw Sun Classic Beach Hat Raffia Wide Brim', 'BROOKLYN ATHLETICS', 'small', 'blue', 30, 'Saskachewan', 'COMFORTABLE FIT: This Pierside hat features an adjustable draw cord chin strap with a toggle to customize your fit along with a lined headband for comfort\r\n\n CARE: The Pierside hat is constructed of 100% rafia straw fiber and should not be submerged in water or kept stored where the integrity of the hat crown is compromised'),
(10003, 'ManHat', 'Hurley Men\'s League Dri-fit Snapback Baseball Cap', 'Hurley', 'x-large', 'black', 26, 'Alberta', '100% Polyester\r\nImported\r\nSnap closure\r\nHand Wash Only\r\nHigh Quality Cotton Blend: Lightweight and breathable brimmed cap; Vented crown for superior comfort, fit, and style\r\nClassic Trucker Cap: Six panel design with snap back closure adjusts to your head so one size fits all; Stays put when you\'re surfing, skating, or having a summer BBQ with friends'),
(10004, 'ManHat', 'Columbia Unisex-Adult PFG Snap Back Fish Ballcap', 'Columbia', 'large', 'khaki', 26.3, 'Prince Edward Island', 'Flat Brim: Shield your eyes and stay cool and comfortable during your day in the sun with the Hurley snap-back hat; Feels like a favorite right out of the box\r\nSnap-Back: Men\'s hat fits most head sizes; adjustable snap-back ensures the perfect fit\r\nEasy Care: Hand Wash; Please Reference the Product Description for More Details'),
(10005, 'ManHat', 'Flexfit Men\'s Athletic Baseball Fitted Cap', 'Flexfit', 'medium', 'blue', 47.53, 'New Brunswick', '63% Polyester, 34% Cotton, 3% Spandex\r\nImported\r\nStretch Fitted closure\r\nHand Wash Only\r\nWhether it\'s baseball season or a special company event you\'ve got approaching, take your pick from a variety of colors and sizes to find the perfect fit for you and your team.'),
(10006, 'ManHat', 'Champion Ameritage Dad Adjustable Cap', 'Champion Ameritage', 'large', 'grey', 32.56, 'Québec', 'Adjustable closure\r\nMachine Wash\r\nRelaxed fit\r\nPre-curved bill\r\nAdjustable strap\r\nBranded taping\r\nPatch logo'),
(10007, 'ManHat', 'RICHARDSON 112 Trucker OSFA Baseball HAT Ball Cap', 'RICHARDSON', 'x-large', 'grey', 9.38, 'Nunavut', '3¾“ wide shapeable brim\r\nUPF 50+ certified sun rating\r\nBreathable polyester braid\r\nAdjustable leatherette chinstrap\r\nPacks for travel'),
(10008, 'ManHat', 'Volcom Men\'s Full Stone Flexfit Stretch Hat', 'Volcom', 'large', 'red', 21.47, 'Yukon', 'Pull On closure\r\nHand Wash Only\r\n6 panel XFit Flexfit\r\nTwo color front stone logo embroidery and one color wordmark side logo embroidery'),
(10009, 'ManHat', 'Under Armour Adult Run Shadow Cap', 'Under Armour', 'large', 'black', 120.35, 'Northwest Territories', 'Hook and Loop closure\r\nUA Free Fit: pre-curved visor & unstructured front conforms to your head for a sleek, low profile fit\r\nDurable, stretch woven fabric provides a comfortable fit & feel\r\nUPF 30 protects your skin from the sun\'s harmful rays\r\nMesh panels for strategic ventilation\r\nUA Siro sweatband gives greater stretch & recovery, an ultra-soft feel & more breathable performance'),
(10010, 'ManHat', 'Flexfit Cotton Twill Fitted Cap', 'Flexfit', 'small', 'black', 67.81, 'Newfoundland', 'Signature Synthetic Fibers are used in Flexfits Permacurve PE Visor, which Helps the Hat Maintain its On-The-Field Contours.\r\nA Fused Hard Buckrum Sewn Into the Front of the Crown Provides Excellent Structure and Helps Maintain the Original Flexfit Shape.'),
(20001, 'WomenHat', 'Lisianthus Women Belt Buckle Fedora Hat', 'Lisianthus', 'large', 'brown', 16.45, 'Nova Scotia', 'Pull On closure\r\nMaterial: 65% cotton, 35% polyester\r\nAdjustable strap inside; Hat Circumference: 56-58cm/22-22.8\"; Brim Width: 7cm/2.76\"；Height: 11cm/4.3\"'),
(20002, 'WomenHat', 'Lanzom Women Wide Brim Straw Panama Roll up Hat Belt Buckle Fedora Beach Sun Hat', 'Lanzom', 'medium', 'white', 23.99, 'British Columbia', 'Made of 90% paper straw and 10 % polyester. Straw material. Soft comfortable and breathable to wear.\r\nOne Size fit most lady women,hat circumference 22.5\" ; brim 2.9\" ; You can adjust the size of the hat through the rope inside in the hat.\r\nFoldable and packable:it can be easily carried inside your handbag or beach tote, packable and convenient to carry and absolutely save lots of space.'),
(20003, 'WomenHat', 'Roxy Women\'s Dear Believer Logo Cap', 'Roxy', 'small', 'black', 24, 'Manitoba', 'Adjustable closure\r\nHand Wash Only\r\nFabric: cotton twill weave fabric\r\nConstruction: 6-panel \"j shape\" Construction\r\nVisor/brim: curved visor'),
(20004, 'WomenHat', 'Verabella Women\'s Lightweight Foldable/Packable Beach Sun Hat w/Decorative Bow', 'Verabella', 'small', 'yellow', 27.99, 'New Brunswick', 'Super sun protection: Sun ultraviolet ray will do harm to your skin, makes dark spots and accelerate aging. Verabella sun UV protection hat with wide brim, Great for that extra sun protection you need during those summer-hot days\r\nAdjustable chin strap: Womens sun Hat with detachable chin strap holds hat in place, even during windy day, and is easy to attach and detach; An inner sweatband to help wick moisture away and ensure your utmost comfort'),
(20005, 'WomenHat', 'Livingston Beach Hats for Women Wide Brim Roll-up Foldable Straw Sun Hat Visors', 'Livingston', 'x-large', 'white', 16.99, 'British Columbia', 'Lightweight - Enjoy lightweight, durable comfort in a woven braid straw hat while keeping sweat out of your eyes, a great choice for sports, walking, running, golf and tennis, backpacking even fishing, breathable for the hot summer weather'),
(20006, 'WomenHat', 'Simplicity Hats for Women UPF 50+ UV Sun Protective Convertible Beach Visor Hat', 'Livingston', 'x-large', 'black', 36.99, 'Ontario', 'Lightweight - Enjoy lightweight, durable comfort in a woven braid straw hat while keeping sweat out of your eyes, a great choice for sports, walking, running, golf and tennis, backpacking even fishing, breathable for the hot summer weather'),
(20007, 'WomenHat', 'Roxy Finishline Hat', 'Roxy', 'large', 'green', 45.25, 'Manitoba', 'Pull On closure\r\nHand Wash Only\r\nAdjustable back closure\r\nMesh-backed design\r\nVisor/Brim: Curved visor\r\nROXY foiled screen logo'),
(20008, 'WomenHat', 'Simplicity Women\'s UPF 50+ Wide Brim Roll-up Straw Sun Hat Sun Visor', 'Simplicity', 'medium', 'yellow', 63.49, 'British Columbia', 'Fashionable and trendy designed straw hat, this sun hat has a wide brim for blocking out the sunlight\r\nAdjustable head circumference about 22\"-23.2\" to fit your head size;It is also suitable to wear even with various hair styles such as a ponytail\r\nFeatures a roll-up function; incredibly convenient as it is foldable for easy storage or for taking on the go while traveling'),
(20009, 'WomenHat', 'The Hat Depot 300N 100% Cotton Packable Summer Travel Bucket Beach Sun Hat', 'The Hat Depot', 'small', 'white', 13.99, 'Alberta', '55%Cotton,45%Polyester (Camouflage color) make it, cozy and comfortable for the perfect fit, especially for daily activities under sunlight. So, you don’t want to take it off. Fine cotton fabric protects sensitive scalp from Ultraviolet. Also, soft cotton makes it packable and crush-able and portable, so you can bring it everywhere easily. '),
(20010, 'WomenHat', 'Wallaroo Hat Company Women\'s Petite Victoria Sun Hat', 'Wallaroo Hat', 'x-large', 'blue', 46, 'Ontario', 'THE STRAW HAT HAS GONE MODERN: Wallaroo has popularized the 1960’s Breton sun with the Petite Victoria sun hat. Wallaroo has re-designed the Petite Victoria, made from 100% poly-straw which makes it ultra-lightweight, with a stylish 3 ½\" up-turned brim and comes in a large selection of 10 colors perfect to compliment any outfit for your outdoor sun protection needs.'),
(30001, 'ManPurse', 'TRAVANDO Mens Slim Wallet with Money Clip Credit Card Holder for Men', 'TRAVANDO', 'small', 'black', 29.95, 'Québec', 'Travando’s Wallet offers 11 card pockets The slim wallet is ideal for carrying business cards, credit and debit cards, bills etc.. The outside notch allows you to push out the cards Tested by an independent German quality control institute. Our wallets block the 13.56 MHz band and protect against data theft by RFID scanners'),
(30002, 'ManPurse', 'Hwin Men Travel Shoulder Bag Cell Phone Crossbody Purse', 'TRAVANDO', 'small', 'red', 60.99, 'Québec', 'It Comes With 1 Removable and Adjustable strap+ 1 clip that can be hooked to backpack/the loop of your pants or suitcase as one accessory bag.or you can hang your keys on the outside hook, and never have to search for them. great for traveling, walking a dog,hiking, golfing, biking, skiing,working.'),
(30003, 'ManPurse', 'GUESS Men\'s Leather Slim Bifold Wallet', 'GUESS', 'small', 'black', 25.14, 'Prince Edward Island', 'This wallet is made of 100% genuine leather. We only accept top quality materials, as we want you to get the luxury feel that you deserve. Soft to the touch and long-lasting, this leather will protect your belongings with ease and style.\r\nWith 6 card pockets, a clear ID window, and a currency pocket, there is more than enough room for all of your essentials. Yet, this silhouette stays flat in your pocket with a slim design, keeping everything perfectly in place.'),
(30004, 'ManPurse', 'Fossil Men\'s Leather Slim Minimalist Bifold Front Pocket Wallet', 'Fossil', 'small', 'brown', 25.14, 'Alberta', 'A wallet to fit in your front pocket, this slim style was created to hold your folded cash, carry your ID and organize your credit cards—all at once\r\nExterior Details: 100% Leather; front pocket bifold wallet; no closure; imported'),
(30005, 'ManPurse', 'Herschel Hank RFID', 'Herschel', 'medium', 'grey', 37.99, 'Alberta', 'Faux Leather lining\r\nNo Closure closure\r\nHand Wash\r\nRFID blocking layer to help prevent the unwarranted scanning of identification, credit and debit cards.\r\nSignature striped fabric liner'),
(30006, 'ManPurse', 'Ariat Men\'s Boot-Embroidery Rodeo Brown Wallet', 'Ariat', 'medium', 'yellow', 50.02, 'Alberta', 'Hand Wash\r\nSlender pebbled-leather card case featuring contrast embroidered design and silver-tone logo hardware'),
(30007, 'ManPurse', 'Timberland Men\'s Leather Trifold Wallet with ID Window', 'Timberland', 'large', 'black', 9.99, 'Manitoba', '100% man made materials lining\r\nTrifold closure\r\n100% GENUINE LEATHER WALLET - This mens trifold wallet is crafted from genuine Italian leather, with a soft texture that is very smooth to the touch and will look terrific even as it ages with everyday use'),
(40001, 'WomanPurse', 'Fossil Women\'s Fiona Large Crossbody Purse Handbag', 'Fossil', 'x-large', 'blue', 113.17, 'Ontario', 'This perforated eco leather crossbody features 1 front zipper pocket, 1 back slide pocket and an adjustable and detachable crossbody strap. This handbag is eco-friendly with the use of Litehide, leather that has undergone resource-efficient raw materials processing that significantly reduces water'),
(40002, 'WomanPurse', 'Handbags for Women Large Designer Ladies Hobo bag Bucket Purse Faux Leather', 'Realer', 'large', 'brown', 39.99, 'Ontario', 'Top zipper closure, with 2 side zipper pockets design, 1 back zipper pocket and elegant tassels decoration, fashionable purses for women, perfect for shopping, dating and business, the best gift for your wife, mom, girls, and family'),
(40003, 'WomanPurse', 'Handbags for Women Shoulder Bags Tote Satchel Hobo 3pcs Purse Set', 'LOVEVOOK', 'large', 'grey', 72.43, 'British Columbia', 'Top zipper closure, with 2 side zipper pockets design, 1 back zipper pocket and elegant tassels decoration, fashionable purses for women, perfect for shopping, dating and business, the best gift for your wife, mom, girls, and family'),
(40004, 'WomanPurse', 'Handwoven Round Rattan Bag Shoulder Leather Straps Natural Chic Hand NATURAL NEO', 'NATURAL NEO', 'medium', 'black', 61.79, 'British Columbia', 'Being 100% handcrafted by Vietnamese artisans. Featly bag has a lightweight and environmental quality which matches you who has the attraction of neatness and who is natural with most kinds of clothes as its name given FEATLY!'),
(40005, 'WomanPurse', 'Triple Zip Small Crossbody Bag', 'FASHION PUZZLE', 'small', 'yellow', 43.61, 'Manitoba', '8.5\" (L) x 5.5\" (H) x 2.75\" (D)\r\nZipper closure\r\nSoft faux leather & gold tone hardware\r\nAdjustable shoulder strap with 26\" drop\r\n1 open pocket & 1 zipper pocket inside'),
(40006, 'WomanPurse', 'Michael Kors Women\'s Jet Set Travel Multifunction Phone Case', 'Michael Kors', 'small', 'brown', 54.72, 'New Brunswick', 'Michael Kors Womens\r\n7\" wide 4\" high 1\" Width\r\n6 Card Holders Plus 1 ID Window\r\nInterior Details: One Zip Coin Pocket, One Cell Phone Pocket, One Open Pocket\r\nCompatible with iPhone 4,5,6,7, 7S,8, 8S and Samsung Galaxy'),
(40007, 'WomanPurse', 'OGIO Women\'s Brooklyn Tablet Purse', 'OGIO', 'large', 'black', 64, 'Manitoba', 'Crafted in rich pebble leather, this versatile bag can be carried as a clutch without the strap, a wristlet or worn crossbody making it the perfect choice for both dressed up and casual looks. Material: Pebble pattern cowhide leather with soft hand feeling, silver hardware and brown fabric Lining.'),
(50001, 'Backpack', 'Matein Travel Laptop Backpack', 'Matein', 'large', 'grey', 25.99, 'Alberta', 'One separate laptop compartment hold 15.6 Inch Laptop as well as 15 Inch,14 Inch and 13 Inch Laptop. One spacious packing compartment roomy for daily necessities,tech electronics accessories. Front compartment with many pockets, pen pockets and key fob hook, make your items organized and easier to find'),
(50002, 'Backpack', 'SHRRADOO Laptop Backpack Travel Backpacks Bookbag', 'SHRRADOO', 'medium', 'purple', 25.99, 'Alberta', 'LOTS OF STORAGE SPACE&POCKETS: One separate laptop compartment hold 15 Inch Laptop as well as 15 Inch,14 Inch and 13 Inch Macbook/Laptop. One spacious packing compartment roomy for daily necessities,tech electronics accessories. Front compartment with many pockets, pen pockets and key fob hook, make your items organized and easier to find'),
(50003, 'Backpack', 'Under Armour Adult Hustle 5.0 Backpack', 'Under Armour', 'x-large', 'white', 55, 'Ontario', 'Machine Wash\r\nUA Storm technology delivers an element-battling, highly water-resistant finish\r\nBreathable air-mesh padded back panel & adjustable, HeatGear shoulder straps for total comfort\r\nSoft-lined laptop sleeve—holds up to 15\" MacBook Pro or similarly sized laptop'),
(50004, 'Backpack', 'JanSport SuperBreak One Backpack - Lightweight School Bookbag', 'JanSport', 'x-large', 'black', 130.75, 'Ontario', 'Zip closure\r\n15\" shoulder drop\r\nHand Wash\r\nSUPERBREAK ONE DETAILS – Simple & convenient bookbag with spacious storage in the main compartment, our signature front utility pocket with built-in organizer, & a side water bottle pocket'),
(50005, 'Backpack', 'Everest 1045K Basic Backpack, Aqua Blue, One Size', 'Everest', 'small', 'khaki', 115.47, 'Ontario', 'Dimensions 11\" x 5\" x 15\" (LxWxH)\r\nA mid-size backpack in a modern, streamlined silhouette ideal for school, work, travel and everyday use\r\nSpacious main compartment with double zipper closure\r\nFront zippered pocket for easy access\r\nAvailable in a multitude of colors to fit your personal style'),
(50006, 'Backpack', 'Carhartt Trade Series Backpack', 'Carhartt', 'small', 'yellow', 74.99, 'Ontario', 'Rugged, durable, roomy backpack made of synthetic fabric with Rain Defender water repellent\r\nRoomy main compartment with zippered opening; zippered front pocket for smaller items; large enough for high school students\' books and supplies\r\nFront organization panel for pens and pencils; mesh water bottle pocket on the side; webbed haul-handle on top\r\nAdjustable padded shoulder straps; triple needle-stick construction\r\n12w x 17.5h x 6d inches; 0.7 pounds'),
(50007, 'Backpack', 'MANCIO Slim Laptop Backpack with USB Charging Port', 'MANCIO', 'small', 'green', 25.99, 'Québec', 'Total 5 Compartments to organized your belongs well. One main laptop compartment hold 15.6 Inch Laptop as well as 15 Inch,14 Inch and 13 Inch Macbook/Laptop , 2 front zip pocket provides a separated space for your iPhone, iPad, pens, keys, wallet, books, clothes,It’s a convenient bag to find what you want in a hurry,one bottle'),
(60001, 'GymBag', 'Sports Gym Bag with Wet Pocket & Shoes Compartment', 'sportsnew', 'medium', 'grey', 18.99, 'Québec', 'Dry & Wet Compartment Separation: This gym tote delivers spacious storage with 1 large main zippered compartment for dry & clean clothes or everything for gym & traveling you necessary, and 1 upgraded waterproof PVC lined pocket (14\" x 10.5\") with zipper for wet items alongside the main compartment, in addition, 1 front external small zipper pocket for easy, on-the-go storage'),
(60002, 'GymBag', 'Travel Duffel Bag,Sports Tote Gym Bag,Shoulder Weekender Overnight Bag for Women', 'HYC00', 'small', 'pink', 38.99, 'Québec', 'The high density water resistant material can help you to separate dry items and wet items,if you have wet clothes or towel,you can put it in this crossbody bag.Dimensions：(H*W*T）27x55x18cm /10.63*21.65*7.09 inch,0.6kg weight (For reference only, please refer to the actual measurement).'),
(60003, 'GymBag', 'Lightweight Canvas Duffle Bags for Men & Women For Sports Equipment Bag', 'HYC00', 'small', 'black', 14.99, 'Alberta', 'GYM BAG (KIT BAG): This gear bag is perfectly suited for carrying your sports items, dirty laundry, shoes, yoga mat, & even toiletries! Bring it all with you and never be unprepared'),
(60004, 'GymBag', 'Sports Gym Bag with Fitness Workout Bag for Men and Women, Purple', 'sportsnew', 'small', 'purple', 14.99, 'Alberta', 'This gym bag is consist of different compartments to separate your wet and dry, clean and dirty stuffs; It has one upgraded waterproof zipped PVC lined pocket, which features 16.5” x 11”, providing roomy space for your wet clothes and toiletries, plus one compartment for dry & clean clothes or everything for gym & traveling necessity and a small inner pocket for your important small stuffs'),
(60005, 'GymBag', 'Sport Gym Duffle Travel Bag for Men Women with Shoe Compartment, Wet Pocket', 'BLUBOON', 'medium', 'white', 29.99, 'Alberta', 'Gym bag with shoe compartment to keep your sneakers and dirty gear separated, as well a zipped plastic wet pocket for bathing suits or travel toiletries\r\nSport Bag Size:18.1 L x 8.7 W x 9.1 H Inch, Capacity 23L, great size for overnight or shortime trip. It\'s a great duffel for gym, swimming, workout, travel, yoga, camping, hiking and many outdoor activities'),
(60006, 'GymBag', 'BALEINE Gym Bag for Women and Men, Small Duffel Bag for Sports', 'BALEINE', 'x-large', 'green', 19.99, 'Manitoba', 'Separate compartment to store your sneakers and shoes, swimsuits, toiletries, and wet towels. Additional storage pockets to organize your items and gym accessories.'),
(60007, 'GymBag', 'Herschel Novel Duffel Bag, Navy/Tan Synthetic Leather, Classic 42.5L', 'Herschel', 'x-large', 'blue', 189.99, 'British Columbia', 'Separate compartment to store your sneakers and shoes, swimsuits, toiletries, and wet towels. Additional storage pockets to organize your items and gym accessories.'),
(90001, 'Private', 'Key Bottle Openers with Candy Box In Vintage Style Escort Tags French Ribbon', 'MAKHRY', 'small', 'yellow', 1.99, 'British Columbia', '50 Set Skeleton Rose Key Bottle Openers with Candy Box In Antique Vintage Style Escort Tags French Ribbon.The Key Bottle openers are made of alloy,free of Lead,sturdy and useful.'),
(90002, 'Private', 'Outus 15 Pieces Eiffel Tower Keyring Retro Adornment French Souvenirs Keychains', 'OUTUS', 'small', 'silver', 1.99, 'British Columbia', 'Eiffel tower adornment size(LWH): 2.2 x 2.2 x 5 cm/ 0.87 x 0.87 x 1.97 inches (key chain trap is included), just fine size for keyring adornments\r\nKeychain total length: approx. 9.8 cm/ 3.86 inches, keyring diameter is approx. 2.9 cm/ 1.14 inch'),
(90003, 'Private', '30Pcs Rose Flower Shape Bottle Openers for Bridal Shower Favors Gifts', 'OUTUS', 'small', 'gold', 1.99, 'Alberta', 'Creative nautical production：Rose flower shape bottle opener favors packed in a gift box, which will be great for a unique gift that will make your family and friends surprised for a long time'),
(90004, 'Private', 'Totally Bamboo A Slice of Life California Bamboo Serving and Cutting Board', 'Totally Bamboo', 'large', 'yellow', 1.99, 'Alberta', 'Savor a slice of the Golden State with this beautiful bamboo serving and cutting board with artwork inspired by the cities, places and people of California'),
(90005, 'Private', 'New York Souvenir Decorative Metal Spoon', 'Lisa NY', 'small', 'silver', 1.99, 'Manitoba', 'New York Souvenir Decorative Spoon with Golden Statue of Liberty at the Top and Famous New York Landmark at the Bottom\r\nGreat for Gift or Collection\r\nMaterial: Stainless Spoon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;