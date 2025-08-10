-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Samedi 03 Mai 2025 à 02:01
-- Version du serveur: 5.0.27
-- Version de PHP: 5.2.0
-- 
-- Base de données: `asia`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `recipes`
-- 

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(255) default NULL,
  `user_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- 
-- Contenu de la table `recipes`
-- 

INSERT INTO `recipes` (`id`, `title`, `category`, `ingredients`, `instructions`, `image`, `user_id`) VALUES 
(7, 'Jjajangmyeon', 'Korean', 'Nouilles de blé, 200g porc haché, 1 oignon, pâte de soja noir', '1. Faites revenir les légumes et la viande dans un peu d''huile. 2. Ajoutez la pâte de soja noir et l''eau pour faire la sauce. 3. Faites cuire les nouilles et mélangez avec la sauce.', 'jjajangmyeon.jpeg', 1),
(3, 'Kimchi', 'Korean', '- 1 chou napa (chou chinois)\r\n- 1/4 tasse de sel de mer\r\n- 1 c. à soupe de sucre\r\n- 4 gousses d''ail hachées\r\n- 1 c. à café de gingembre râpé\r\n- 2 c. à soupe de sauce de poisson\r\n- 1 c. à soupe de piment coréen (gochugaru)\r\n- 2 oignons verts émincés', '1. Coupez le chou en morceaux, salez-le et laissez-le dégorger 1 heure.\r\n2. Rincez bien et égouttez.\r\n3. Mélangez l’ail, gingembre, sucre, sauce de poisson et gochugaru pour faire une pâte.\r\n4. Mélangez le chou avec la pâte et les oignons verts.\r\n5. Mettez dans un bocal hermétique et laissez fermenter 2-3 jours à température ambiante.', 'kimchi.jpeg', 1),
(4, 'Mochi', 'Korean', '- 1 tasse de farine de riz gluant\r\n- 1/4 tasse de sucre\r\n- 1/2 tasse d''eau\r\n- Fécule de maïs (pour saupoudrer)', '1. Mélangez farine, sucre et eau dans un bol.\r\n2. Faites cuire au micro-ondes 2 minutes, mélangez, puis 1 minute de plus.\r\n3. Poudrez un plan de travail avec de la fécule.\r\n4. Étalez la pâte, coupez en petits morceaux et formez des boules.\r\n5. Laissez refroidir avant de déguster.', 'mochi.jpeg', 1),
(5, 'Kimbap', 'Korean', '- 2 tasses de riz cuit\r\n- 4 feuilles de nori\r\n- 1 carotte\r\n- 1 concombre\r\n- 2 œufs battus\r\n- 2 c. à soupe d’huile de sésame\r\n- Sel au goût', '1. Assaisonnez le riz avec huile de sésame et sel.\r\n2. Coupez carotte et concombre en julienne, faites-les sauter.\r\n3. Faites une omelette fine avec les œufs, coupez-la en lamelles.\r\n4. Sur une feuille de nori, étalez une fine couche de riz, ajoutez les garnitures.\r\n5. Roulez et coupez en tranches.', 'kimbap.jpeg', 1),
(6, 'Tteokbokki', 'Korean', '- 300g de tteok (gâteaux de riz)\r\n- 2 tasses d''eau\r\n- 2 c. à soupe de gochujang\r\n- 1 c. à soupe de sucre\r\n- 1 c. à soupe de sauce soja\r\n- 1 œuf dur\r\n- 1 oignon vert émincé', '1. Faites tremper les tteok dans l’eau tiède 20 min s’ils sont durs.\r\n2. Dans une casserole, mélangez eau, gochujang, sucre, et sauce soja.\r\n3. Ajoutez les gâteaux de riz et faites cuire 10-15 minutes.\r\n4. Ajoutez l’œuf dur et l’oignon vert, servez chaud.', 'tteokbokki.jpeg', 1),
(21, 'Poulet Kung Pao', 'Chinese', 'Poulet, Cacahuètes, Piments rouges secs, Poivrons, Sauce soja, Vinaigre, Ail', 'Sautez le poulet. Ajoutez les légumes, piments, cacahuètes, et la sauce. Faites mijoter brièvement.', 'Poulet Kung Pao (Chinese).jpeg', 1),
(22, 'Bœuf aux Oignons', 'Chinese', 'Bœuf émincé, Oignons, Sauce soja, Huile, Maïzena, Ail, Poivre', 'Faites mariner le bœuf. Faites revenir avec les oignons. Ajoutez la sauce. Faites cuire à feu vif.', 'Bœuf aux Oignons (Chinese).jpeg', 1),
(15, 'Riz Cantonnais', 'Chinese', 'Riz cuit, Œufs, Petits pois, Jambon, Oignons verts, Sauce soja, Huile de sésame', 'Faites revenir les œufs. Ajoutez les légumes, jambon, riz. Assaisonnez avec sauce soja et huile de sésame.', 'Riz Cantonnais (Chinese).jpeg', 1),
(16, 'Raviolis Chinois (Jiaozi)', 'Chinese', 'Pâte à raviolis, Porc haché, Chou chinois, Gingembre, Sauce soja, Ail, Ciboule', 'Mélangez la farce. Déposez dans la pâte. Fermez les raviolis et cuisez-les à la vapeur ou à la poêle.', 'Raviolis Chinois (Jiaozi) (Chinese).jpeg', 1),
(40, 'Cotton Cheesecake', 'Japanese', '5 large eggs, at room temperature\r\n1/4 tsp cream of tartar\r\n1/2 cup sugar, divided\r\n8 oz cream cheese, at room temperature\r\n1/2 cup low-fat milk\r\n1/4 cup unsalted butter, at room temperature\r\n1 Tbsp lemon juice\r\n1/4 cup all-purpose flour\r\n2 Tbsp corn starch\r\n8 inch round springform pan', '1. Line the bottom and side of the springform pan with parchment paper. Wrap with foil.\r\n2. Fill a baking pan with water and place it on the lowest rack. Preheat oven to 315°F (157°C).\r\n3. Separate the eggs. Beat egg whites until foamy, add cream of tartar and gradually 1/4 cup sugar. Beat until soft peaks.\r\n4. In another bowl, mix cream cheese and milk until smooth. Add butter, remaining sugar, lemon juice, flour, corn starch, and egg yolks. Strain the batter.\r\n5. Fold in the egg whites in 3 parts gently.\r\n6. Pour batter into the pan, smooth the top, and tap to remove air bubbles.\r\n7. Bake in water bath for 1h10. Check doneness. Bake 10-15 min more to brown the top.\r\n8. Let cool in oven (door ajar) for 1 hour.\r\n9. Refrigerate at least 4 hours. Serve with fruits or toppings of choice.', 'Japanese Cotton Cheesecake.jpeg', 1),
(18, 'Canard Laqué', 'Chinese', 'Canard entier, Miel, Vinaigre, Sauce soja, Cinq-épices, Ail, Gingembre', 'Badigeonnez le canard. Faites-le mariner. Rôtissez au four jusqu’à obtenir une peau croustillante.', 'Canard Laqué (Chinese).jpeg', 1),
(19, 'Soupe Aigre-Piquante', 'Chinese', 'Champignons noirs, Tofu, Bambou, Vinaigre noir, Sauce soja, Piment, Œuf', 'Faites cuire les légumes. Ajoutez tofu, vinaigre, sauce soja, piment. Versez l’œuf en filet.', 'Soupe Aigre-Piquante (Chinese).jpg', 1),
(20, 'Nouilles Sautées', 'Chinese', 'Nouilles, Poulet ou bœuf, Poivrons, Oignons, Sauce soja, Huile de sésame', 'Faites sauter les légumes et la viande. Ajoutez les nouilles et la sauce. Mélangez bien.', 'Nouilles Sautées (Chinese).jpeg', 1),
(12, 'Dakgangjeong', 'Korean', '500g de poulet (morceaux désossés), 1/2 tasse de fécule, 1 cuil. à soupe de sucre, sauce soja', '1. Enrobez le poulet de fécule et faites-le frire jusqu''à ce qu''il soit doré. 2. Mélangez le sucre et la sauce soja pour faire la sauce. 3. Versez la sauce sur le poulet croustillant.', 'dakgangjeong.jpg', 1),
(13, 'Bibimbap', 'Korean', 'Riz cuit, 100g de bœuf haché, 1 carotte, 1 courgette, épinards, œuf', '1. Faites cuire chaque légume séparément. 2. Faites cuire le bœuf dans une poêle. 3. Disposez tous les ingrédients sur le riz. Ajoutez l''œuf cru et un peu de sauce soja.', 'bibimbap.jpeg', 1),
(14, 'Odeng', 'Korean', 'Feuilles de poisson (eomuk/odeng), 1 litre d''eau, légumes', '1. Pliez les feuilles de poisson en accordéon. 2. Faites bouillir les feuilles dans l''eau pendant quelques minutes. 3. Ajoutez des légumes au choix.', 'odeng.jpeg', 1),
(23, 'Tofu Mapo', 'Chinese', 'Tofu, Viande hachée, Pâte de haricots fermentés, Sauce soja, Ail, Gingembre, Piment', 'Faites revenir viande, ail, gingembre. Ajoutez le tofu et la sauce. Faites mijoter à feu doux.', 'Tofu Mapo (Chinese).jpeg', 1),
(24, 'Rouleaux de Printemps', 'Chinese', 'Feuilles de riz, Vermicelles, Crevettes, Laitue, Menthe, Sauce hoisin', 'Faites tremper les feuilles. Garnissez de légumes et crevettes. Roulez et servez avec la sauce.', 'Rouleaux de Printemps.jpeg', 1),
(25, 'Sushi au Saumon', 'Japanese', 'Riz à sushi, Vinaigre de riz, Saumon cru, Feuilles de nori, Sauce soja, Wasabi', 'Prépare le riz assaisonné. Forme des boulettes et pose une tranche de saumon dessus. Sers avec sauce soja.', 'Sushi au Saumon.jpeg', 1),
(27, 'Takoyaki', 'Japanese', 'Pâte à takoyaki, Poulpe, Gingembre mariné, Ciboule, Bonite séchée, Sauce okonomiyaki, Mayonnaise japonaise', 'Remplis un moule spécial avec pâte et ingrédients. Tourne les boules jusqu’à cuisson. Garnis avec sauces.', 'Takoyaki.jpeg', 1),
(28, 'Okonomiyaki', 'Japanese', 'Chou, Farine, Œufs, Crevettes ou porc, Sauce okonomiyaki, Mayonnaise, Aonori, Bonite séchée', 'Mélange la pâte avec les ingrédients. Fais cuire en galette des deux côtés. Nappe de sauce et toppings.', 'Okonomiyaki (Japanese).jpeg', 1),
(29, 'Tempura', 'Japanese', 'Crevettes, Légumes (patate douce, aubergine), Farine, Eau glacée, Œuf', 'Prépare une pâte légère. Trempe et fais frire les ingrédients jusqu’à dorure.', 'Tempura (Japanese).jpeg', 1),
(30, 'Donburi au Bœuf (Gyudon)', 'Japanese', 'Riz, Bœuf émincé, Oignons, Sauce soja, Mirin, Sucre, Gingembre', 'Fais mijoter le bœuf dans la sauce. Sers chaud sur du riz.', 'Donburi au Bœuf (Gyudon) (Japanese).jpeg', 1),
(31, 'Onigiri', 'Japanese', 'Riz, Sel, Feuilles de nori, Prune salée, Thon mayo, Saumon grillé', 'Forme des triangles avec le riz et une garniture. Enroule dans du nori.', 'Onigiri (Japanese).jpeg', 1),
(32, 'Soupe Miso', 'Japanese', 'Dashi, Pâte miso, Tofu, Wakame, Ciboule', 'Chauffe le dashi, ajoute la pâte miso, puis le tofu et les algues. Sers chaud.', 'Soupe Miso (Japanese).jpeg', 1),
(33, 'Yakitori', 'Japanese', 'Blanc de poulet, Sauce soja, Mirin, Sucre, Brochettes en bambou', 'Enfile le poulet sur brochettes. Fais griller en badigeonnant de sauce sucrée.', 'Yakitori.jpeg', 1),
(34, 'Katsudon', 'Japanese', 'Riz, Porc pané (tonkatsu), Œufs, Oignons, Bouillon, Sauce soja', 'Fais mijoter le porc avec l’œuf et les oignons dans un bol. Verse sur du riz.', 'Katsudon (Japanese).jpeg', 1),
(35, 'Hotteok ', 'Korean', 'Farine, Levure, Eau tiède, Sucre, Sel, Lait, Huile\\nFarce : Cassonade, Cannelle, Noix hachées', '1. Prépare une pâte avec la farine, levure, eau, lait, sucre et sel. Laisse-la reposer jusqu’à ce qu’elle double de volume.\\n2. Mélange la farce : cassonade, cannelle et noix.\\n3. Prends un peu de pâte, aplatis-la, ajoute la farce et referme.\\n4. Fais frire dans une poêle huilée en aplatissant légèrement jusqu’à ce que les deux côtés soient dorés.\\n5. Sers chaud avec un cœur fondant.', 'hotteok.jpeg', 1),
(36, 'Dasik ', 'Korean', 'Poudre de sésame noir ou blanc, Farine de riz gluant, Miel, Poudre de graines de pin, Poudre de haricots mungo, Colorants naturels (optionnel)', '1. Mélange la poudre de graines (sésame, haricots, etc.) avec du miel jusqu’à obtenir une pâte malléable.\\n2. Si souhaité, colore la pâte avec des ingrédients naturels (matcha, betterave, etc.).\\n3. Forme des petites boules ou utilise un moule traditionnel à dasik pour les presser.\\n4. Laisse sécher à l’air pendant quelques heures avant de servir.', 'dasik.jpeg', 1),
(37, 'Bingsu', 'Korean', 'Glace pilée, Lait concentré sucré, Haricots rouges sucrés (pat), Tranches de fruits (bananes, fraises, mangue), Sirop, Gâteaux de riz (tteok), Glace ou yaourt (optionnel)', '1. Pile la glace finement jusqu’à obtenir une texture neigeuse.\\n2. Dispose la glace dans un bol.\\n3. Ajoute les haricots rouges, les fruits tranchés et les toppings de ton choix.\\n4. Verse du lait concentré sucré et un filet de sirop.\\n5. Garnis de glace, yaourt ou de morceaux de gâteau de riz selon les préférences.', 'bingsu.jpEg', 1),
(39, 'Chapssaltteok (Mochi coréen)', 'Korean', 'Farine de riz gluant, Eau, Sucre, Fécule de maïs, Haricots rouges sucrés (pâte d’anko)', '1. Dans un bol, mélanger la farine de riz gluant, l’eau et le sucre.\\n2. Chauffer le mélange au micro-ondes ou à la vapeur jusqu’à épaississement.\\n3. Étaler la pâte sur une surface saupoudrée de fécule de maïs.\\n4. Couper en petits cercles et garnir de pâte de haricots rouges.\\n5. Refermer en formant une boule et rouler doucement pour arrondir.', 'chapssaltteok.jpeg', 1),
(41, 'Easy Fluffy Japanese Pancakes', 'Japanese', '2 large free-range egg yolks\r\n200 ml buttermilk\r\n4 tablespoon white sugar\r\n¼ teaspoon vanilla extract\r\n1 tablespoon Japanese mayonnaise (optional)\r\n210 g all-purpose flour\r\n1½ teaspoon baking powder\r\n2 egg whites, chilled\r\nvegetable oil, for cooking', '1. In a large bowl, whisk together egg yolks, sugar, buttermilk, vanilla, and mayonnaise.\r\n2. Sift in flour and baking powder. Mix until smooth.\r\n3. In another bowl, beat chilled egg whites until stiff peaks form.\r\n4. Fold 1/3 of the egg whites into the batter, then gently fold in the rest until smooth and foamy.\r\n5. Cut parchment strips and prepare four 3-inch ring moulds. Grease and line them with parchment.\r\n6. Heat a skillet over medium heat, lightly oil, and place the rings inside.\r\n7. Fill each ring 2/3 with batter. Cover and cook ~4 min until batter rises and bottom is set.\r\n8. Flip carefully and cook another ~4 min until golden and cooked through.\r\n9. Remove from moulds and serve with your favorite toppings.', 'fluffypancakes.jpeg', 1),
(42, 'Hanami Dango (Japanese Skewered Rice Dumplings)', 'Japanese', '1 1/3 cup Joshinko (non-glutinous rice flour) – 150 g\r\n1 1/2 cup Shiratamako (glutinous sweet rice flour) – 200 g\r\n3/4 cup powdered sugar (optional) – 75 g\r\n1 1/3 cup hot water\r\n1 tsp matcha powder + 1 tsp water\r\n1 drop pink food coloring\r\n12 small bamboo skewers', '1. Soak 12 small bamboo skewers in water.\r\n2. In a bowl, mix 150g Joshinko, 200g Shiratamako, and optional 75g powdered sugar.\r\n3. Pour in 1 1/3 cup hot water and mix. Knead by hand until dough is smooth (soft like clay).\r\n4. Divide dough into 3 parts. \r\n   - Add 1 drop pink food coloring to one.\r\n   - Add matcha paste (1 tsp matcha + 1 tsp water) to another.\r\n   - Leave the last one white.\r\n5. Roll each dough into ~20g balls (about 36 balls total).\r\n6. Boil water and cook white balls first. When they float, cook 2 min more. Transfer to ice water.\r\n7. Repeat with pink balls, then green balls (to prevent color transfer).\r\n8. Skewer dango: green first, white in middle, pink last.\r\n9. Serve plain or with toppings like sweet soy glaze, red bean paste, or matcha.', 'dango.jpeg', 1),
(43, 'Japanese Black Tea Cake Roll', 'Japanese', 'For the sponge cake:\r\n4 large eggs (room temperature)\r\n60 g granulated sugar\r\n1 Tbsp honey (optional)\r\n2 Tbsp milk\r\n60 g cake flour (sifted)\r\n1–1.5 tsp hojicha powder (or finely ground Earl Grey)\r\n1/2 tsp baking powder\r\n2 Tbsp neutral oil (canola, etc.)\r\n\r\nFor the filling:\r\n200 ml heavy cream (cold)\r\n2 Tbsp sugar\r\n1/2 tsp vanilla extract\r\n\r\nTopping (optional):\r\nWhipped cream\r\nBiscoff/speculoos biscuits\r\nChocolate pearls\r\nRosemary sprigs', '1. Preheat oven to 170°C. Line a 28x28 cm pan with parchment paper.\r\n2. Beat eggs and sugar until fluffy (about 5 min). Add honey and milk, mix gently.\r\n3. Sift and fold in cake flour, hojicha powder, and baking powder. Add oil and fold until just combined.\r\n4. Pour batter into pan, smooth out, tap to release bubbles.\r\n5. Bake for 12–14 minutes until lightly golden and springy.\r\n6. Let cool 2 min, invert onto parchment, peel bottom sheet. Roll while warm to shape and cool completely.\r\n7. Whip cream with sugar and vanilla to medium-stiff peaks.\r\n8. Unroll cake, spread whipped cream, roll tightly. Wrap and chill at least 2 hours.\r\n9. Decorate with piped cream, cookies, chocolate pearls, and rosemary. Slice and serve chilled.', 'rollcake.jpeg', 1),
(44, 'Strawberry Mille Crêpes Cake', 'Japanese', 'Crêpes:\r\n6 eggs\r\n180 g flour\r\n60 g sugar\r\n750 ml milk\r\n60 g melted butter\r\n1 tsp vanilla extract\r\n\r\nCream:\r\n500 ml heavy cream (cold)\r\n3 tbsp powdered sugar\r\n1 tsp vanilla extract\r\n\r\nTopping:\r\nFresh strawberries\r\nWhipped cream\r\nBerry coulis (optional)', '1. Prepare the crêpes batter and rest for 30 minutes.\r\n2. Cook thin crêpes and let them cool.\r\n3. Whip cream with sugar and vanilla until stiff.\r\n4. Stack: crêpe, whipped cream, repeat.\r\n5. Chill for 2 hours to set.\r\n6. Decorate with strawberries and whipped cream. Serve chilled.', 'strawberry_mille_crepes.jpeg', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `users`
-- 

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES 
(1, 'nihel', 'nihelbenhamida41@gmail.com', '543df86420033d09621432562a3bd7075a0f913c'),
(2, 'nihelben', 'nihelbenhamida41@gmail.com', '543df86420033d09621432562a3bd7075a0f913c');
