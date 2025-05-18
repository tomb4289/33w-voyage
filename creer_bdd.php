<?php
// Charger WordPress
require('wp-load.php');

// Définir les noms des catégories
/*
$categories = array(
    'Aventure',
    'Culturel',
    'Repos',
    'Zen',
    'Sport',
    'Économique',    
    'croisiere',
    'Paysage',
    'Pleine nature',

);
*/

$categories = array(
    'Aventure' => 'Partez à la découverte de destinations exaltantes et d\'expériences uniques à travers le monde. Plongez dans l\'inconnu, explorez des paysages spectaculaires et vivez des sensations fortes qui vous laisseront des souvenirs inoubliables.',
    'Culturel' => 'Immergez-vous dans la richesse culturelle et historique de lieux fascinants à travers le globe. Découvrez l\'art, l\'architecture, la gastronomie et les traditions locales qui font la diversité et la beauté de notre monde.',
    'Repos' => 'Offrez-vous une escapade relaxante dans des destinations tranquilles où le temps semble s\'arrêter. Détendez-vous sur des plages de sable blanc, ressourcez-vous dans des spas luxueux et laissez-vous choyer pour retrouver calme et sérénité.',
    'Zen' => 'Retrouvez l\'harmonie intérieure et la paix de l\'esprit dans des environnements propices à la méditation, au yoga et à la relaxation. Connectez-vous avec votre être intérieur et laissez-vous porter par la quiétude des lieux.',
    'Sport' => 'Entraînez-vous, défiez-vous et repoussez vos limites dans des destinations offrant une multitude d\'activités sportives en plein air. Que ce soit pour le ski, la plongée, la randonnée ou d\'autres sports, vivez des aventures sportives inoubliables.',
    'Économique' => 'Explorez le monde sans vous ruiner grâce à des voyages économiques qui vous permettent de découvrir de nouvelles cultures, de rencontrer des gens du monde entier et de créer des souvenirs uniques sans vous soucier de votre budget.',
    'croisière' => 'La catégorie de voyage "croisière" offre une expérience de voyage unique et enrichissante en naviguant sur les mers et les océans à bord d\'un navire de croisière. Ce type de voyage combine le plaisir de découvrir de multiples destinations avec le confort et la commodité d\'un hôtel flottant. Les croisières peuvent être adaptées à différents types de voyageurs, que ce soit pour une escapade romantique en amoureux, des vacances en famille, une aventure solo ou même des voyages de groupe. Les croisières offrent une variété d\'activités à bord pour divertir les passagers, allant des restaurants gastronomiques et des bars lounge aux piscines, aux spas, aux salles de sport et aux spectacles en soirée. Les passagers peuvent également profiter d\'excursions à terre dans les ports d\'escale, explorant des destinations exotiques, des sites historiques, des plages paradisiaques, des marchés locaux et bien plus encore. L\'un des principaux avantages des croisières est la possibilité de découvrir plusieurs destinations lors d\'un seul voyage, sans avoir à constamment faire et défaire ses bagages. Cela permet aux voyageurs de maximiser leur temps de vacances et de vivre une expérience diversifiée en explorant différentes cultures, paysages et attractions tout en restant dans le confort et la sécurité d\'un navire de croisière. Que ce soit pour une croisière en Méditerranée, dans les Caraïbes, en Alaska, en Scandinavie ou ailleurs, les croisières offrent une expérience de voyage inoubliable, où chaque jour apporte de nouvelles découvertes et aventures.',
    'Pleine nature' => 'Échappez à l\'agitation urbaine et reconnectez-vous avec la nature sauvage dans des destinations préservées où la faune et la flore règnent en maîtres. Explorez des parcs nationaux, des réserves naturelles et des espaces préservés pour une immersion totale dans la nature.'
);


// Importer la classe $wpdb
global $wpdb;

// Ajouter les catégories à WordPress et récupérer les IDs
$category_ids = array();
foreach ($categories as $category_name => $category_description) {
    $category_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$category_name'");
    
    if (!$category_id) {
        $wpdb->insert(
            $wpdb->terms,
            array('name' => $category_name, 'slug' => sanitize_title($category_name)),
            array('%s', '%s')
        );

        $category_id = $wpdb->insert_id;
        
        // Assigner la catégorie à la table term_taxonomy
        $wpdb->insert(
            $wpdb->term_taxonomy,
            array('term_id' => $category_id,  'description' => $category_description, 'taxonomy' => 'category'),
            array('%d', '%s', '%s')
        );
        
        echo "La catégorie '$category_name' a été créée avec l'ID : $category_id<br>";
    } else {
        echo "La catégorie '$category_name' existe déjà avec l'ID : $category_id<br>";
    }

    $category_ids[$category_name] = $category_id;
}

// Afficher les résultats
echo 'Catégories et leurs ID :<br>';
foreach ($category_ids as $category_name => $category_id) {
    echo "$category_name : $category_id<br>";
}


/////////////////////////////////////////////////////////
// Définir les données des articles


// catégorie aventure
$articles = array(
    array(
        'post_title' => 'Interlaken, Suisse',
        'post_content' => 'Située entre les lacs de Brienz et de Thoune, Interlaken est un paradis d\'aventure entouré par les majestueuses Alpes suisses. Les amateurs de sensations fortes peuvent s\'essayer au parapente au-dessus des sommets, au canyoning dans les gorges glaciaires ou au saut en parachute avec vue sur l\'Eiger, le Mönch et la Jungfrau. Les sports nautiques sur les lacs alpins et les excursions en téléphérique vers des sommets enneigés offrent une expérience complète. Interlaken est le point de départ idéal pour explorer la région de l\'Oberland bernois.',
        'post_status' => 'publish',
        'post_type' => 'post',
         'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Costa Rica',
        'post_content' => 'Le Costa Rica, joyau d\'aventures en Amérique centrale, offre une biodiversité étonnante dans un écrin de forêts tropicales. Les aventuriers peuvent s\'engager dans des tyroliennes à travers la canopée, explorer des volcans actifs comme l\'Arenal, et surfer sur les vagues de la côte pacifique. Les sentiers de la réserve de Monteverde mènent à des ponts suspendus offrant des vues spectaculaires sur la canopée. Les amateurs de rafting peuvent affronter les rapides du Pacuare. Le Costa Rica propose une aventure à chaque coin de rue, du Pacifique à la mer des Caraïbes.',
        'post_status' => 'publish',
        'post_type' => 'post',
          'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Patagonie, Argentine',
        'post_content' => 'La Patagonie argentine, terre de vastes étendues sauvages, offre une aventure brute. Le parc national des Glaciers abrite le célèbre glacier Perito Moreno, où les audacieux peuvent s\'engager dans une excursion de trekking glaciaire. Les montagnes du parc national Nahuel Huapi proposent des randonnées épiques avec des vues imprenables sur les lacs alpins. La région offre également des possibilités de kayak sur des lacs cristallins et des ascensions de sommets majestueux comme le Fitz Roy.',
        'post_status' => 'publish',
        'post_type' => 'post',
         'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Chamonix, France',
        'post_content' => 'Chamonix, au pied du Mont Blanc, est le paradis des alpinistes et des amateurs de sports extrêmes. Les skieurs peuvent dévaler les pentes de la Vallée Blanche, tandis que les grimpeurs défient les parois rocheuses des Aiguilles de Chamonix. Les amateurs de sensations fortes peuvent s\'essayer au parapente au-dessus des sommets enneigés ou au saut en base jump depuis l\'Aiguille du Midi. Les sentiers de randonnée offrent des vues à couper le souffle sur les Alpes françaises.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),

    array(
        'post_title' => 'Mont Fuji, Japon',
        'post_content' => 'Le Mont Fuji, icône sacrée du Japon, offre une aventure unique entre spiritualité et exploration. Les alpinistes peuvent entreprendre l\'ascension nocturne pour atteindre le sommet au lever du soleil, une expérience spirituelle profonde. Les sentiers autour du mont Fuji mènent à des points de vue panoramiques sur la campagne japonaise. Les lacs voisins, comme le lac Kawaguchi, offrent des croisières paisibles avec le majestueux Fuji en toile de fond.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Banff National Park, Canada',
        'post_content' => 'Le Banff National Park, joyau des Rocheuses canadiennes, est un terrain de jeu pour les amateurs d\'aventure. Les pistes de ski de renommée mondiale à Lake Louise et Sunshine Village attirent les passionnés de sports d\'hiver. Les sentiers de randonnée, comme le Plain of Six Glaciers, offrent des panoramas sur les sommets enneigés. Les activités nautiques sur le lac Moraine et le lac Louise ajoutent une dimension d\'aventure à la beauté naturelle du parc.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Torres del Paine, Chili',
        'post_content' => 'Les Torres del Paine au Chili sont une icône de la Patagonie, offrant une aventure au cœur de paysages spectaculaires. Les randonneurs peuvent parcourir le célèbre circuit du W, passant devant des glaciers, des lacs turquoise et des pics granitiques. Les kayakers peuvent naviguer sur les eaux gelées du lac Grey, tandis que les grimpeurs peuvent s\'attaquer aux sommets imposants des Cuernos del Paine.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Santorin, Grèce',
        'post_content' => 'Santorin, au-delà de ses couchers de soleil romantiques, offre une aventure unique. Les randonneurs peuvent explorer les sentiers côtiers de la caldera, révélant des vues panoramiques sur les villages blancs perchés. Les explorateurs sous-marins peuvent plonger dans les eaux cristallines pour découvrir les vestiges de l\'Atlantide antique, tandis que les amateurs de vent peuvent naviguer autour de l\'île en catamaran.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),
    array(
        'post_title' => 'Yangshuo, Chine',
        'post_content' => 'Yangshuo, avec ses pics karstiques émergeant de la rivière Li, est une toile de fond époustouflante pour une aventure en Chine. Les cyclistes peuvent sillonner les sentiers de campagne entre les rizières et les formations rocheuses. Les croisières sur la rivière Li offrent des panoramas à couper le souffle, tandis que les amateurs d\'escalade peuvent défier les parois karstiques emblématiques.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(2), // Remplacez 1 par l'ID de la catégorie "Aventure"
    ),


// catégorie culturel

    array(
        'post_title' => 'Paris, France',
        'post_content' => 'Paris, surnommée la Ville Lumière, est un véritable joyau culturel. En tant que berceau de la Renaissance, la ville regorge de trésors artistiques, architecturaux et littéraires. Les visiteurs peuvent explorer des monuments emblématiques tels que la Tour Eiffel, la Cathédrale Notre-Dame et le Sacré-Cœur, ainsi que des musées renommés comme le Louvre, abritant la Joconde de Léonard de Vinci, et le Musée d\'Orsay, où sont exposées des œuvres impressionnistes et post-impressionnistes. Les charmantes rues pavées de Montmartre, le quartier artistique de Montparnasse et les boutiques de créateurs de la Rive Gauche offrent une immersion dans la vie culturelle parisienne. Sans oublier la délicieuse cuisine française, les cafés animés et les spectacles de cabaret qui font de Paris une destination incontournable pour les amateurs d\'art, de gastronomie et de romance.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Londres, Royaume-Uni
    array(
        'post_title' => 'Londres, Royaume-Uni',
        'post_content' => 'Londres est une métropole cosmopolite où l\'histoire côtoie la modernité. Avec ses monuments emblématiques comme le Big Ben, le Parlement et la Tour de Londres, ses théâtres légendaires du West End et ses galeries d\'art mondialement connues comme la Tate Modern et la National Gallery, la ville offre une richesse culturelle inégalée. Les amateurs d\'histoire peuvent explorer les vestiges de l\'Empire britannique à travers le British Museum et Buckingham Palace, tandis que les passionnés d\'art contemporain peuvent se perdre dans les quartiers branchés de Shoreditch et de Camden. Londres est également une plaque tournante de la musique, de la mode et de la gastronomie, avec ses marchés animés, ses restaurants étoilés au Michelin et ses festivals culturels tout au long de l\'année.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Ajoutez les autres destinations ici...
    // Florence, Italie
    array(
        'post_title' => 'Florence, Italie',
        'post_content' => 'Florence, berceau de la Renaissance italienne, est une véritable galerie à ciel ouvert. La ville est réputée pour ses chefs-d\'œuvre artistiques, ses magnifiques églises et ses palais somptueux. Les visiteurs peuvent admirer des œuvres d\'art emblématiques comme le David de Michel-Ange à la Galerie de l\'Académie, les fresques du Duomo et les peintures de la Galerie des Offices. Les ruelles pavées de Florence sont également parsemées de boutiques d\'artisanat local, de trattorias traditionnelles et de cafés historiques où l\'on peut déguster un bon café ou un gelato. Avec ses vues panoramiques depuis la Piazzale Michelangelo et ses jardins paisibles du Boboli, Florence séduit les amateurs d\'art, d\'histoire et de dolce vita.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Vienne, Autriche
    array(
        'post_title' => 'Vienne, Autriche',
        'post_content' => 'Vienne, capitale autrichienne, est une ville d\'une grande richesse culturelle. Connue pour ses palais impériaux, ses opéras renommés et son architecture baroque, la ville offre une immersion dans le faste de l\'Empire des Habsbourg. Les visiteurs peuvent visiter le majestueux Palais de Schönbrunn, la résidence d\'été des Habsbourg, assister à un opéra au Staatsoper ou se promener dans les jardins du Belvédère. Vienne est également réputée pour ses cafés viennois traditionnels, où l\'on peut déguster des pâtisseries délicieuses tout en écoutant de la musique classique. Avec ses musées d\'art de classe mondiale, ses concerts de musique classique et son ambiance aristocratique, Vienne est une destination culturelle incontournable en Europe.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Prague, République tchèque
    array(
        'post_title' => 'Prague, République tchèque',
        'post_content' => 'Prague, capitale bohémienne, est une ville médiévale empreinte de mystère et de magie. Avec ses ruelles pavées, ses châteaux médiévaux et ses églises gothiques, la ville offre un voyage dans le temps à travers l\'histoire européenne. Les visiteurs peuvent explorer le magnifique Château de Prague, flâner sur le Pont Charles bordé de statues baroques et visiter la vieille ville pittoresque avec sa célèbre horloge astronomique. Prague est également célèbre pour sa scène artistique dynamique, ses cafés historiques et sa vie nocturne animée. Avec ses brasseries traditionnelles, ses concerts de musique classique et ses festivals culturels, Prague séduit les voyageurs en quête de romantisme et de mystère.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Saint-Pétersbourg, Russie
    array(
        'post_title' => 'Saint-Pétersbourg, Russie',
        'post_content' => 'Saint-Pétersbourg, la Venise du Nord, est une ville impériale aux richesses culturelles infinies. Fondée par Pierre le Grand, la ville abrite des palais somptueux, des musées prestigieux et une architecture grandiose. Les visiteurs peuvent admirer les trésors de l\'Ermitage, l\'un des plus grands musées d\'art du monde, flâner le long des canaux pittoresques et visiter les palais impériaux comme le Palais d\'Hiver et le Palais de Peterhof. Saint-Pétersbourg est également célèbre pour ses nuits blanches en été, où le soleil ne se couche presque jamais, offrant une ambiance magique à la ville. Avec ses ballets classiques, ses opéras somptueux et son héritage littéraire, Saint-Pétersbourg est une destination culturelle incontournable en Russie.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Kyoto, Japon
    array(
        'post_title' => 'Kyoto, Japon',
        'post_content' => 'Kyoto incarne l\'essence même de la tradition japonaise. En tant qu\'ancienne capitale impériale, la ville regorge de temples bouddhistes, de jardins zen et de quartiers préservés, offrant une immersion dans la culture et l\'histoire du Japon. Les visiteurs peuvent découvrir des trésors architecturaux tels que le Temple Kinkaku-ji, recouvert d\'or, le Pavillon d\'Argent du Temple Ginkaku-ji et le célèbre sanctuaire Fushimi Inari-taisha, avec ses milliers de torii vermillon. Kyoto est également réputée pour ses arts traditionnels tels que la cérémonie du thé, la cérémonie des fleurs de cerisier et la cérémonie du kaiseki, offrant une expérience authentique de la culture japonaise.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),
    // Rome, Italie
    array(
        'post_title' => 'Rome, Italie',
        'post_content' => 'Rome, la Ville Éternelle, est un musée à ciel ouvert rempli de vestiges de l\'Antiquité, de chefs-d\'œuvre de la Renaissance et de trésors baroques. Les visiteurs peuvent explorer des sites emblématiques tels que le Colisée, le Forum romain, le Panthéon et la Fontaine de Trevi, témoins de la grandeur de l\'Empire romain. La cité offre également une richesse artistique incomparable avec des musées renommés comme les Musées du Vatican, abritant la chapelle Sixtine de Michel-Ange, et la Galleria Borghese, présentant les œuvres de Bernini et de Caravage. Rome est également une ville vivante où l\'on peut déguster une cuisine délicieuse, flâner dans ses ruelles pavées et vivre la dolce vita à l\'italienne.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(3) // Remplacez 3 par l'ID de la catégorie "Culturel"
    ),

// catégorie repos

    array(
        'post_title' => 'Prague, République tchèque',
        'post_content' => 'Prague, surnommée la "ville aux cent tours", est une destination de repos idyllique en Europe centrale. La ville regorge de charme médiéval, avec ses ruelles pavées, ses places pittoresques et son architecture gothique. Les visiteurs peuvent se perdre dans la vieille ville, admirer l\'horloge astronomique du XVe siècle sur la place de la Vieille Ville et se promener sur le pont Charles, offrant des vues panoramiques sur la ville et le fleuve Vltava. Prague est également connue pour ses jardins paisibles, comme le Jardin royal du château de Prague, où l\'on peut flâner parmi les fleurs et les fontaines. Pour une expérience de détente ultime, rien de tel qu\'une croisière sur la Vltava au coucher du soleil, avec vue sur les magnifiques monuments illuminés de la ville. Avec ses cafés animés, ses brasseries traditionnelles et son atmosphère romantique, Prague est l\'endroit parfait pour se ressourcer et se relaxer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Santorin, Grèce',
        'post_content' => 'Santorin, perle des Cyclades grecques, est une destination de repos envoûtante nichée au cœur de la mer Égée. Réputée pour ses villages blancs aux dômes bleus, perchés au sommet de falaises volcaniques, l\'île offre des vues à couper le souffle sur la caldeira et le coucher de soleil le plus célèbre au monde. Les visiteurs peuvent explorer les charmantes ruelles de villages comme Oia et Fira, se détendre sur les plages de sable noir ou rouge, et déguster une cuisine méditerranéenne délicieuse dans les tavernes en bord de mer. Santorin est également réputée pour ses spas de luxe, offrant des soins de bien-être tels que des massages, des bains thermaux et des traitements de beauté, dans un cadre idyllique surplombant la mer. Avec son ambiance romantique, ses couchers de soleil spectaculaires et son hospitalité chaleureuse, Santorin est l\'endroit idéal pour se détendre et se ressourcer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Kyoto, Japon',
        'post_content' => 'Kyoto, ancienne capitale impériale du Japon, est une oasis de tranquillité au milieu de l\'effervescence urbaine. La ville est célèbre pour ses temples bouddhistes, ses jardins zen et ses geishas élégantes, offrant une immersion dans la culture traditionnelle japonaise. Les visiteurs peuvent se promener dans les jardins paisibles du temple de Kinkaku-ji, méditer dans le sanctuaire de Fushimi Inari-taisha, ou assister à une cérémonie du thé authentique dans un pavillon de thé historique. Kyoto est également réputée pour sa cuisine raffinée, avec ses restaurants étoilés au Michelin proposant des spécialités locales telles que le kaiseki, un repas dégustation raffiné. Pour une expérience relaxante, rien de tel qu\'une promenade en bateau sur la rivière Kamo, offrant des vues pittoresques sur les cerisiers en fleurs et les montagnes environnantes. Avec ses temples séculaires, ses jardins sereins et son atmosphère paisible, Kyoto est une destination parfaite pour se détendre et se ressourcer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Dubrovnik, Croatie',
        'post_content' => 'Dubrovnik, surnommée la "Perle de l\'Adriatique", est une ville médiévale magnifiquement préservée, située sur la côte dalmate de la Croatie. Entourée de remparts imposants et baignée par les eaux cristallines de la mer Adriatique, la ville offre un mélange envoûtant de culture, d\'histoire et de paysages côtiers. Les visiteurs peuvent se promener dans les ruelles pavées de la vieille ville, admirer l\'architecture baroque des églises et des palais, ou monter sur les remparts pour profiter de vues panoramiques sur la ville et la mer. Dubrovnik est également un lieu de villégiature prisé pour ses plages pittoresques, ses restaurants de fruits de mer frais et ses excursions en bateau vers les îles voisines. Pour une expérience de détente ultime, rien de tel qu\'une croisière le long de la côte, avec des arrêts pour nager dans des criques isolées et explorer des grottes marines cachées. Avec son ambiance méditerranéenne détendue, ses couchers de soleil spectaculaires et son patrimoine culturel riche, Dubrovnik est l\'endroit parfait pour se ressourcer et se détendre.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Queenstown, Nouvelle-Zélande',
        'post_content' => 'Queenstown, nichée au bord du magnifique lac Wakatipu et entourée par les majestueuses montagnes du sud de l\'île, est une destination de repos par excellence. Connue comme la capitale mondiale de l\'aventure, la ville offre une multitude d\'activités de plein air, comme le ski, le snowboard, le saut à l\'élastique, le rafting en eau vive et la randonnée. Pour ceux qui préfèrent une escapade plus paisible, Queenstown propose également des croisières relaxantes sur le lac, des visites de vignobles locaux, des séances de spa et des excursions en bateau à vapeur historique. Avec son atmosphère décontractée, ses paysages à couper le souffle et sa gamme d\'activités de loisirs, Queenstown est l\'endroit idéal pour se ressourcer et se relaxer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Luang Prabang, Laos',
        'post_content' => 'Luang Prabang, située au confluent des rivières Mékong et Nam Khan, est une ville paisible au charme intemporel, inscrite au patrimoine mondial de l\'UNESCO. La ville est célèbre pour ses temples bouddhistes magnifiquement ornés, ses monastères centenaires et son architecture coloniale française. Les visiteurs peuvent assister à la cérémonie matinale de l\'aumône des moines, explorer les marchés animés, comme le marché nocturne de Luang Prabang, et visiter des sites emblématiques comme le Wat Xieng Thong et le mont Phousi pour des vues panoramiques sur la ville. Luang Prabang est également un point de départ idéal pour des excursions dans la nature environnante, avec des cascades pittoresques, des grottes mystérieuses et des villages traditionnels à découvrir. Avec son atmosphère sereine, sa richesse culturelle et sa beauté naturelle, Luang Prabang offre une retraite apaisante loin du tumulte de la vie quotidienne.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Bruges, Belgique',
        'post_content' => 'Bruges, surnommée la "Venise du Nord", est une ville médiévale pittoresque, aux canaux sinueux, aux maisons à pignons colorées et aux places pavées. Classée au patrimoine mondial de l\'UNESCO, la ville regorge de trésors architecturaux, avec ses églises gothiques, ses beffrois imposants et ses hôtels de ville ornés. Les visiteurs peuvent se promener le long des canaux en bateau ou à pied, visiter des musées d\'art renommés comme le Groeningemuseum et déguster des délices belges tels que les gaufres, les chocolats et les bières locales dans les tavernes en bord de mer. Avec son ambiance romantique, ses ruelles pavées et ses merveilles architecturales, Bruges est une destination idéale pour se détendre et se ressourcer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),
    array(
        'post_title' => 'Chefchaouen, Maroc',
        'post_content' => 'Chefchaouen, nichée dans les montagnes du Rif au nord du Maroc, est une ville pittoresque aux rues étroites et aux maisons peintes en bleu. Connue comme la "ville bleue", Chefchaouen offre une atmosphère paisible et relaxante, idéale pour se détendre et se ressourcer. Les visiteurs peuvent se promener dans les ruelles pavées de la médina, visiter la kasbah du XVIIIe siècle et explorer les souks colorés où l\'on trouve des tapis berbères, des poteries artisanales et des bijoux traditionnels. Chefchaouen est également un point de départ idéal pour des randonnées dans les montagnes environnantes, avec des sentiers pittoresques offrant des vues spectaculaires sur la campagne et les cascades. Pour une expérience relaxante, rien de tel qu\'une séance de hammam traditionnel ou un moment de détente sur une terrasse ensoleillée avec vue sur la ville. Avec son ambiance tranquille, son charme pittoresque et son hospitalité chaleureuse, Chefchaouen est une destination de repos parfaite au cœur du Maroc.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(4) // Remplacez 4 par l'ID de la catégorie "Repos"
    ),

// catégorie Zen


    array(
        'post_title' => 'Ubud, Bali',
        'post_content' => 'Ubud, situé au cœur de l\'île indonésienne de Bali, est un véritable sanctuaire de tranquillité et de bien-être. Connue pour sa culture artistique florissante, sa nature luxuriante et ses pratiques spirituelles, Ubud attire les voyageurs en quête de relaxation et de revitalisation. Les visiteurs peuvent participer à des cours de yoga matinaux dans des studios traditionnels entourés de rizières verdoyantes, pratiquer la méditation dans des temples sacrés perchés sur les collines, ou se détendre lors de séances de spa inspirées des traditions balinaises. Les rues animées de la ville regorgent de galeries d\'art, de boutiques d\'artisanat local et de cafés biologiques proposant une cuisine saine et délicieuse. Les sites emblématiques d\'Ubud incluent le Monkey Forest, un sanctuaire forestier habité par des singes, et les rizières en terrasses de Tegallalang, offrant des panoramas à couper le souffle. Avec son ambiance paisible, son hospitalité chaleureuse et ses nombreuses possibilités de bien-être, Ubud est une destination idéale pour retrouver l\'harmonie intérieure et se ressourcer.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),
    array(
        'post_title' => 'Rishikesh, Inde',
        'post_content' => 'Rishikesh, située dans l\'État indien de l\'Uttarakhand, est une ville sacrée au bord du Gange, réputée comme la capitale mondiale du yoga et de la méditation. Nichée entre les contreforts de l\'Himalaya et les rives sacrées du fleuve, Rishikesh offre un environnement idéal pour la pratique spirituelle et le bien-être. Les voyageurs peuvent participer à des cours de yoga donnés par des maîtres renommés, méditer dans les ashrams le long du fleuve, ou assister à des discours spirituels dans les temples et les centres de méditation. Rishikesh est également connue pour ses festivals culturels, notamment le festival international de yoga, qui attire des pratiquants du monde entier. Les environs de Rishikesh offrent des possibilités d\'aventure, avec des treks dans l\'Himalaya, des sports aquatiques sur le Gange, et des safaris dans les réserves naturelles voisines. Avec son ambiance spirituelle, son cadre naturel magnifique et ses traditions millénaires, Rishikesh est une destination inspirante pour retrouver l\'équilibre intérieur et la sérénité.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),
    array(
        'post_title' => 'Tulum, Mexique',
        'post_content' => 'Tulum, située sur la côte caribéenne du Mexique, est un paradis tropical offrant une escapade zen loin de l\'agitation urbaine. Connue pour ses plages de sable blanc, ses ruines mayas et son ambiance bohème, Tulum attire les voyageurs en quête de détente et de connexion avec la nature. Les visiteurs peuvent participer à des séances de yoga sur la plage au lever du soleil, méditer dans des cenotes sacrés, ou se détendre lors de massages relaxants dans des cabanes en bord de mer. Tulum est également réputée pour sa scène culinaire éclectique, avec ses restaurants de cuisine locale et internationale, mettant en valeur des ingrédients frais et biologiques. Les ruines de Tulum, perchées au sommet d\'une falaise surplombant la mer des Caraïbes, offrent un lieu unique pour admirer les couchers de soleil spectaculaires et se connecter avec l\'histoire ancienne de la région. Avec ses plages paradisiaques, son ambiance décontractée et ses activités de bien-être, Tulum est une destination idéale pour se ressourcer et se reconnecter avec soi-même.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),
    array(
        'post_title' => 'Santorin, Grèce',
        'post_content' => 'Santorin, une île emblématique des Cyclades grecques, est réputée pour ses vues à couper le souffle, ses couchers de soleil spectaculaires et son ambiance relaxante. Perchée au sommet de falaises volcaniques surplombant la mer Égée, Santorin offre un cadre idyllique pour se détendre et se ressourcer. Les voyageurs peuvent pratiquer le yoga au bord de la mer, méditer en admirant les paysages pittoresques ou se détendre dans des spas de luxe offrant des soins revitalisants. Les villages blancs pittoresques de Santorin, comme Oia et Fira, offrent des ruelles sinueuses bordées de boutiques d\'artisanat local, de galeries d\'art et de tavernes traditionnelles proposant une cuisine méditerranéenne délicieuse. Les plages de sable noir et rouge offrent également des endroits paisibles pour se baigner et se détendre sous le soleil grec. Avec son ambiance romantique, ses paysages époustouflants et ses activités de bien-être, Santorin est une destination de rêve pour une escapade zen.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),
    array(
        'post_title' => 'Napa Valley, Californie',
        'post_content' => 'Napa Valley, située en Californie, est une région viticole réputée pour ses paysages pittoresques, ses vignobles renommés et son ambiance détendue. Les visiteurs peuvent explorer les vignobles et déguster des vins primés, participer à des cours de cuisine et de dégustation, ou se détendre lors de promenades tranquilles dans les vignobles. Napa Valley offre également une cuisine raffinée, avec des restaurants étoilés au guide Michelin proposant des menus gastronomiques mettant en valeur les produits locaux. Les spas de la région offrent des soins relaxants à base de produits à base de raisin, pour une expérience de bien-être complète. Avec son climat doux, ses paysages vallonnés et sa culture viticole florissante, Napa Valley est une destination idéale pour se ressourcer et profiter de la beauté de la nature.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),
    array(
        'post_title' => 'Kyoto, Japon',
        'post_content' => 'Kyoto, ancienne capitale du Japon, est une ville empreinte de tradition, de spiritualité et de beauté. Les visiteurs peuvent se promener dans les jardins zen des temples bouddhistes, assister à des cérémonies du thé, ou se détendre lors de bains thermaux traditionnels. Kyoto est également réputée pour ses cerisiers en fleurs au printemps, offrant un spectacle magnifique et une ambiance paisible. Les ruelles pavées de la vieille ville regorgent de boutiques d\'artisanat traditionnel, de restaurants servant une cuisine kaiseki raffinée et de maisons de thé où l\'on peut déguster du matcha. Les jardins et les parcs de Kyoto offrent des espaces tranquilles pour se promener et se ressourcer au milieu de la nature. Avec son atmosphère sereine, ses temples majestueux et sa richesse culturelle, Kyoto est une destination idéale pour une expérience zen au Japon.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
    ),


// catégorie sport

array(
    'post_title' => 'Whistler, Canada',
    'post_content' => 'Whistler, située en Colombie-Britannique, est une destination de renommée mondiale pour les amateurs de sports d\'hiver. Avec ses vastes domaines skiables, ses pistes variées et ses installations de classe mondiale, Whistler offre une expérience de ski et de snowboard inoubliable. En été, la région se transforme en un paradis pour les activités de plein air, avec des possibilités de VTT, de randonnée, de golf et de sports nautiques sur les lacs alpins.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Bora Bora, Polynésie française',
    'post_content' => 'Bora Bora est un paradis tropical offrant une multitude d\'activités nautiques pour les amateurs de sports aquatiques. Les visiteurs peuvent faire de la plongée sous-marine parmi les récifs coralliens colorés, faire de la voile sur les eaux cristallines, faire du kayak à travers les lagons paisibles, ou faire du paddleboard le long des côtes pittoresques.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Interlaken, Suisse',
    'post_content' => 'Interlaken, nichée entre deux lacs alpins et entourée par les sommets enneigés des Alpes suisses, est une destination idéale pour les amateurs de sports d\'aventure. Les visiteurs peuvent pratiquer le parapente au-dessus des vallées verdoyantes, faire du rafting sur les eaux tumultueuses des rivières alpines, faire de l\'escalade sur les parois rocheuses ou faire du saut à l\'élastique depuis les ponts suspendus.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Cancún, Mexique',
    'post_content' => 'Cancún est une destination ensoleillée offrant une multitude d\'activités sportives en plein air. Les voyageurs peuvent faire de la plongée avec tuba dans les eaux cristallines de la mer des Caraïbes, faire de la planche à voile sur les vagues, faire du jet ski le long des côtes, ou faire de la pêche sportive en haute mer.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Queenstown, Nouvelle-Zélande',
    'post_content' => 'Queenstown, surnommée la "capitale de l\'aventure", est une destination prisée pour les sports extrêmes et les activités de plein air. Les visiteurs peuvent faire du saut à l\'élastique depuis le pont Kawarau, faire du parachutisme au-dessus des montagnes, faire du jet boat sur les rivières tumultueuses, ou faire du ski sur les pentes enneigées de Coronet Peak.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Kona, Hawaï',
    'post_content' => 'Kona, située sur la côte ouest de l\'île d\'Hawaï, est célèbre pour ses conditions idéales pour le surf, la plongée et la pêche en haute mer. Les voyageurs peuvent surfer sur les vagues puissantes de la baie de Kailua, plonger parmi les récifs coralliens vibrants, ou partir à la recherche de thons et de marlins lors de sorties de pêche sportive.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Arosa, Suisse',
    'post_content' => 'Arosa, une station de ski pittoresque nichée dans les Alpes suisses, offre une variété d\'activités sportives en hiver et en été. Les visiteurs peuvent dévaler les pistes de ski et de snowboard en hiver, faire de la randonnée alpine et du VTT en été, ou faire du parapente au-dessus des sommets enneigés.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),
array(
    'post_title' => 'Bariloche, Argentine',
    'post_content' => 'Bariloche, située dans la région des lacs de Patagonie, est un paradis pour les amateurs de sports d\'aventure. Les visiteurs peuvent faire du ski et du snowboard sur les pentes enneigées de Cerro Catedral en hiver, faire de la randonnée et du VTT dans les montagnes en été, ou faire du kayak sur les lacs cristallins.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 5 par l'ID de la catégorie "sport"
),

 array(
    'post_title' => 'La Costa Brava, Espagne',
    'post_content' => 'La Costa Brava, le long de la côte nord-est de l\'Espagne, est un paradis pour les amateurs de sports nautiques. Avec ses eaux cristallines et ses paysages spectaculaires, la Costa Brava offre des possibilités infinies pour la voile, le kayak, la plongée sous-marine et le surf. Les visiteurs peuvent explorer les criques cachées, les grottes marines et les récifs colorés de cette magnifique région côtière.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
 ),

array(
    'post_title' => 'Kyoto, Japon',
    'post_content' => 'Kyoto, ancienne capitale du Japon, est une ville empreinte de tradition, de spiritualité et de beauté. Les visiteurs peuvent se promener dans les jardins zen des temples bouddhistes, assister à des cérémonies du thé, ou se détendre lors de bains thermaux traditionnels. Kyoto est également réputée pour ses cerisiers en fleurs au printemps, offrant un spectacle magnifique et une ambiance paisible. Les ruelles pavées de la vieille ville regorgent de boutiques d\'artisanat traditionnel, de restaurants servant une cuisine kaiseki raffinée et de maisons de thé où l\'on peut déguster du matcha. Les jardins et les parcs de Kyoto offrent des espaces tranquilles pour se promener et se ressourcer au milieu de la nature. Avec son atmosphère sereine, ses temples majestueux et sa richesse culturelle, Kyoto est une destination idéale pour une expérience zen au Japon.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(5) // Remplacez 5 par l'ID de la catégorie "Zen"
),

array(
    'post_title' => 'Whistler, Canada',
    'post_content' => 'Whistler, située en Colombie-Britannique, est une destination de renommée mondiale pour les amateurs de sports d\'hiver. Avec ses vastes domaines skiables, ses pistes variées et ses installations de classe mondiale, Whistler offre une expérience de ski et de snowboard inoubliable. En été, la région se transforme en un paradis pour les activités de plein air, avec des possibilités de VTT, de randonnée, de golf et de sports nautiques sur les lacs alpins.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Bora Bora, Polynésie française',
    'post_content' => 'Bora Bora est un paradis tropical offrant une multitude d\'activités nautiques pour les amateurs de sports aquatiques. Les visiteurs peuvent faire de la plongée sous-marine parmi les récifs coralliens colorés, faire de la voile sur les eaux cristallines, faire du kayak à travers les lagons paisibles, ou faire du paddleboard le long des côtes pittoresques.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Interlaken, Suisse',
    'post_content' => 'Interlaken, nichée entre deux lacs alpins et entourée par les sommets enneigés des Alpes suisses, est une destination idéale pour les amateurs de sports d\'aventure. Les visiteurs peuvent pratiquer le parapente au-dessus des vallées verdoyantes, faire du rafting sur les eaux tumultueuses des rivières alpines, faire de l\'escalade sur les parois rocheuses ou faire du saut à l\'élastique depuis les ponts suspendus.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Cancún, Mexique',
    'post_content' => 'Cancún est une destination ensoleillée offrant une multitude d\'activités sportives en plein air. Les voyageurs peuvent faire de la plongée avec tuba dans les eaux cristallines de la mer des Caraïbes, faire de la planche à voile sur les vagues, faire du jet ski le long des côtes, ou faire de la pêche sportive en haute mer.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Queenstown, Nouvelle-Zélande',
    'post_content' => 'Queenstown, surnommée la "capitale de l\'aventure", est une destination prisée pour les sports extrêmes et les activités de plein air. Les visiteurs peuvent faire du saut à l\'élastique depuis le pont Kawarau, faire du parachutisme au-dessus des montagnes, faire du jet boat sur les rivières tumultueuses, ou faire du ski sur les pentes enneigées de Coronet Peak.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Kona, Hawaï',
    'post_content' => 'Kona, située sur la côte ouest de l\'île d\'Hawaï, est célèbre pour ses conditions idéales pour le surf, la plongée et la pêche en haute mer. Les voyageurs peuvent surfer sur les vagues puissantes de la baie de Kailua, plonger parmi les récifs coralliens vibrants, ou partir à la recherche de thons et de marlins lors de sorties de pêche sportive.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Arosa, Suisse',
    'post_content' => 'Arosa, une station de ski pittoresque nichée dans les Alpes suisses, offre une variété d\'activités sportives en hiver et en été. Les visiteurs peuvent dévaler les pistes de ski et de snowboard en hiver, faire de la randonnée alpine et du VTT en été, ou faire du parapente au-dessus des sommets enneigés.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Bariloche, Argentine',
    'post_content' => 'Bariloche, située dans la région des lacs de Patagonie, est un paradis pour les amateurs de sports d\'aventure. Les visiteurs peuvent faire du ski et du snowboard sur les pentes enneigées de Cerro Catedral en hiver, faire de la randonnée et du VTT dans les montagnes en été, ou faire du kayak sur les lacs cristallins.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'La Costa Brava, Espagne',
    'post_content' => 'La Costa Brava, le long de la côte nord-est de l\'Espagne, est un paradis pour les amateurs de sports nautiques. Avec ses eaux cristallines et ses paysages spectaculaires, la Costa Brava offre des possibilités infinies pour la voile, le kayak, la plongée sous-marine et le surf. Les visiteurs peuvent explorer les criques cachées, les grottes marines et les récifs colorés de cette magnifique région côtière.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),


 
array(
    'post_title' => 'Moab, Utah, États-Unis',
    'post_content' => 'Moab, nichée au cœur du désert de l\'Utah, est une destination incontournable pour les amateurs de sports d\'aventure. Avec ses paysages lunaires, ses formations rocheuses rouges et ses canyons profonds, Moab offre un terrain de jeu idéal pour le VTT, le canyoning, l\'escalade et le rafting en eau vive. Les visiteurs peuvent également explorer les parcs nationaux voisins, notamment Arches et Canyonlands, pour des aventures inoubliables en plein air.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Whitsunday Islands, Australie',
    'post_content' => 'Les Whitsunday Islands, situées au large de la côte du Queensland, sont un paradis tropical pour les amateurs de sports nautiques. Avec leurs eaux turquoise, leurs plages de sable blanc et leurs récifs coralliens préservés, les Whitsundays offrent des possibilités infinies pour la voile, la plongée sous-marine, le snorkeling et le kayak. Les visiteurs peuvent naviguer autour des îles à bord d\'un voilier, explorer les jardins de corail colorés et nager avec une faune marine diversifiée, notamment des tortues de mer, des poissons tropicaux et des raies manta.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Chamonix, France',
    'post_content' => 'Chamonix, dans les Alpes françaises, est une destination de choix pour les amateurs de sports d\'hiver et d\'alpinisme. Nichée au pied du Mont Blanc, la plus haute montagne d\'Europe occidentale, Chamonix offre des pistes de ski variées, des hors-pistes époustouflants et des possibilités d\'escalade incomparables. En été, les randonneurs peuvent explorer les sentiers alpins, les glaciers et les lacs de montagne, tandis que les amateurs d\'escalade peuvent défier les parois rocheuses emblématiques de la région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Lake Tahoe, Californie/Nevada, États-Unis',
    'post_content' => 'Lake Tahoe, situé à cheval sur la frontière entre la Californie et le Nevada, est un paradis pour les sports de plein air toute l\'année. En hiver, les visiteurs peuvent profiter du ski et du snowboard sur les nombreuses stations de la région, tandis qu\'en été, le lac offre des possibilités de voile, de kayak, de paddleboard et de baignade. Les montagnes environnantes offrent également d\'innombrables sentiers de randonnée et de VTT pour explorer la beauté naturelle de la région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
),

array(
    'post_title' => 'Interlaken, Suisse',
    'post_content' => 'Interlaken, nichée au cœur des Alpes suisses, est une destination de choix pour les amateurs de sports d\'aventure. Avec ses vues spectaculaires sur les montagnes, les lacs et les cascades, Interlaken offre une gamme d\'activités de plein air, notamment le parapente, le saut à l\'élastique, le canyoning et le rafting en eau vive. Les visiteurs peuvent également profiter de la randonnée, du VTT et de l\'escalade dans les environs pittoresques de la région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(6) // Remplacez 6 par l'ID de la catégorie "sport"
)
);

// catégorie économique

$article[] = array(
    'post_title' => 'Hanoï, Vietnam',
    'post_content' => 'Hanoï, la capitale du Vietnam, offre une multitude d\'expériences enrichissantes à moindre coût. Explorez le quartier historique de la vieille ville avec ses rues étroites, ses temples anciens et ses marchés animés. Dégustez la délicieuse cuisine de rue vietnamienne à des prix abordables. Ne manquez pas le spectacle captivant de marionnettes sur l\'eau au théâtre de marionnettes de Thang Long. Avec ses nombreux hôtels et auberges économiques, Hanoï est une destination parfaite pour les voyageurs soucieux de leur budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Mexico, Mexique',
    'post_content' => 'Mexico offre une richesse culturelle et historique à un coût abordable. Découvrez les trésors architecturaux de la ville, tels que le Zócalo, la cathédrale métropolitaine et le Palais national. Explorez les marchés colorés comme le marché de San Juan et le marché de Coyoacán pour des produits locaux à des prix raisonnables. Goûtez à la cuisine mexicaine authentique dans les taquerias et les stands de rue. Avec ses options d\'hébergement abordables et son réseau de transports publics économique, Mexico est une destination idéale pour les voyageurs à petit budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Le Caire, Égypte',
    'post_content' => 'Le Caire, la plus grande ville d\'Égypte, regorge de trésors historiques et culturels accessibles aux voyageurs économiques. Explorez les pyramides de Gizeh, le Sphinx et le musée égyptien pour une plongée fascinante dans l\'histoire ancienne de l\'Égypte. Dégustez la cuisine égyptienne authentique dans les restaurants locaux et les marchés de rue. Avec ses nombreux hôtels bon marché et ses options de transport abordables, Le Caire offre une expérience inoubliable sans casser la tirelire.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Bariloche, Argentine',
    'post_content' => 'Bariloche, située dans la région des lacs de Patagonie, est un paradis pour les amateurs de sports d\'aventure. Les visiteurs peuvent faire du ski et du snowboard sur les pentes enneigées de Cerro Catedral en hiver, faire de la randonnée et du VTT dans les montagnes en été, ou faire du kayak sur les lacs cristallins.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'La Costa Brava, Espagne',
    'post_content' => 'La Costa Brava, le long de la côte nord-est de l\'Espagne, est un paradis pour les amateurs de sports nautiques. Avec ses eaux cristallines et ses paysages spectaculaires, la Costa Brava offre des possibilités infinies pour la voile, le kayak, la plongée sous-marine et le surf. Les visiteurs peuvent explorer les criques cachées, les grottes marines et les récifs colorés de cette magnifique région côtière.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Moab, Utah, États-Unis',
    'post_content' => 'Moab, nichée au cœur du désert de l\'Utah, est une destination incontournable pour les amateurs de sports d\'aventure. Avec ses paysages lunaires, ses formations rocheuses rouges et ses canyons profonds, Moab offre un terrain de jeu idéal pour le VTT, le canyoning, l\'escalade et le rafting en eau vive. Les visiteurs peuvent également explorer les parcs nationaux voisins, notamment Arches et Canyonlands, pour des aventures inoubliables en plein air.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Whitsunday Islands, Australie',
    'post_content' => 'Les Whitsunday Islands, situées au large de la côte du Queensland, sont un paradis tropical pour les amateurs de sports nautiques. Avec leurs eaux turquoise, leurs plages de sable blanc et leurs récifs coralliens préservés, les Whitsundays offrent des possibilités infinies pour la voile, la plongée sous-marine, le snorkeling et le kayak. Les visiteurs peuvent naviguer autour des îles à bord d\'un voilier, explorer les jardins de corail colorés et nager avec une faune marine diversifiée, notamment des tortues de mer, des poissons tropicaux et des raies manta.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);



$article[] = array(
    'post_title' => 'Lake Tahoe, Californie/Nevada, États-Unis',
    'post_content' => 'Lake Tahoe, situé à cheval sur la frontière entre la Californie et le Nevada, est un paradis pour les sports de plein air toute l\'année. En hiver, les visiteurs peuvent profiter du ski et du snowboard sur les nombreuses stations de la région, tandis qu\'en été, le lac offre des possibilités de voile, de kayak, de paddleboard et de baignade. Les montagnes environnantes offrent également d\'innombrables sentiers de randonnée et de VTT pour explorer la beauté naturelle de la région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Interlaken, Suisse',
    'post_content' => 'Interlaken, nichée au cœur des Alpes suisses, est une destination de choix pour les amateurs de sports d\'aventure. Avec ses vues spectaculaires sur les montagnes, les lacs et les cascades, Interlaken offre une gamme d\'activités de plein air, notamment le parapente, le saut à l\'élastique, le canyoning et le rafting en eau vive. Les visiteurs peuvent également profiter de la randonnée, du VTT et de l\'escalade dans les environs pittoresques de la région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Malaga, Espagne',
    'post_content' => 'Malaga, située sur la Costa del Sol en Espagne, est une destination ensoleillée et abordable. Explorez le centre historique de la ville avec ses rues pavées, ses églises anciennes et ses musées fascinants. Détendez-vous sur les plages de sable doré et profitez des délicieux fruits de mer dans les restaurants locaux. Ne manquez pas de visiter l\'Alcazaba, une forteresse mauresque du XIe siècle offrant une vue panoramique sur la ville. Avec ses nombreux hôtels bon marché et ses options de transport abordables, Malaga est une destination idéale pour les voyageurs à petit budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Hanoï, Vietnam',
    'post_content' => 'Hanoï, la capitale du Vietnam, offre une multitude d\'expériences enrichissantes à moindre coût. Explorez le quartier historique de la vieille ville avec ses rues étroites, ses temples anciens et ses marchés animés. Dégustez la délicieuse cuisine de rue vietnamienne à des prix abordables. Ne manquez pas le spectacle captivant de marionnettes sur l\'eau au théâtre de marionnettes de Thang Long. Avec ses nombreux hôtels et auberges économiques, Hanoï est une destination parfaite pour les voyageurs soucieux de leur budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Mexico, Mexique',
    'post_content' => 'Mexico offre une richesse culturelle et historique à un coût abordable. Découvrez les trésors architecturaux de la ville, tels que le Zócalo, la cathédrale métropolitaine et le Palais national. Explorez les marchés colorés comme le marché de San Juan et le marché de Coyoacán pour des produits locaux à des prix raisonnables. Goûtez à la cuisine mexicaine authentique dans les taquerias et les stands de rue. Avec ses options d\'hébergement abordables et son réseau de transports publics économique, Mexico est une destination idéale pour les voyageurs à petit budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Le Caire, Égypte',
    'post_content' => 'Le Caire, la plus grande ville d\'Égypte, regorge de trésors historiques et culturels accessibles aux voyageurs économiques. Explorez les pyramides de Gizeh, le Sphinx et le musée égyptien pour une plongée fascinante dans l\'histoire ancienne de l\'Égypte. Dégustez la cuisine égyptienne authentique dans les restaurants locaux et les marchés de rue. Avec ses nombreux hôtels bon marché et ses options de transport abordables, Le Caire offre une expérience inoubliable sans casser la tirelire.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Siem Reap, Cambodge',
    'post_content' => 'Siem Reap est la porte d\'entrée des célèbres temples d\'Angkor, une merveille architecturale accessible aux voyageurs économiques. Explorez les temples majestueux comme Angkor Wat, Angkor Thom et Ta Prohm à votre propre rythme. Découvrez la culture khmère au musée national d\'Angkor et à travers la cuisine locale dans les restaurants bon marché de la ville. Avec ses hébergements économiques et ses options de restauration abordables, Siem Reap offre une expérience de voyage enrichissante sans se ruiner.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Sofia, Bulgarie',
    'post_content' => 'Sofia, la capitale de la Bulgarie, est une destination économique offrant une richesse culturelle et historique. Explorez la ville à pied pour découvrir des trésors architecturaux comme la cathédrale Alexandre-Nevski et l\'église Saint-Nicolas. Visitez le musée national d\'Histoire pour une immersion dans le passé tumultueux de la Bulgarie. Dégustez des plats traditionnels bulgares dans les restaurants locaux à des prix abordables. Avec ses hébergements bon marché et ses transports publics peu coûteux, Sofia est une destination idéale pour les voyageurs soucieux de leur budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Ho Chi Minh-Ville, Vietnam',
    'post_content' => 'Ho Chi Minh-Ville, anciennement connue sous le nom de Saigon, est une ville animée du Vietnam offrant une expérience culturelle et historique à un coût abordable. Explorez les sites historiques tels que la cathédrale Notre-Dame de Saigon, le palais de la Réunification et le musée des vestiges de la guerre. Dégustez la délicieuse cuisine vietnamienne dans les restaurants locaux et les stands de rue. Avec ses hébergements économiques et ses options de transport abordables, Ho Chi Minh-Ville est une destination prisée des voyageurs à petit budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);
   

$article[] = array(
    'post_title' => 'Lviv, Ukraine',
    'post_content' => 'Lviv, située dans l\'ouest de l\'Ukraine, est une ville historique au charme européen à moindre coût. Flânez dans la vieille ville pittoresque pour admirer son architecture baroque, ses églises anciennes et ses ruelles pavées. Visitez des sites emblématiques comme la place du marché, la cathédrale Saint-Georges et le château de Lviv. Dégustez des spécialités ukrainiennes dans les cafés et les restaurants locaux à des prix abordables. Avec ses nombreux hôtels économiques et ses attractions gratuites ou peu coûteuses, Lviv est une destination abordable pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Tallinn, Estonie',
    'post_content' => 'Tallinn, la capitale de l\'Estonie, est une ville médiévale bien préservée offrant une richesse historique à petit prix. Promenez-vous dans la vieille ville fortifiée pour découvrir ses tours médiévales, ses églises anciennes et ses places pittoresques. Visitez des musées fascinants comme le musée des occupations et le musée maritime. Dégustez des plats estoniens traditionnels dans les tavernes locales à des prix abordables. Avec ses nombreuses auberges bon marché et ses options de restauration économiques, Tallinn est une destination idéale pour les voyageurs à petit budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Zagreb, Croatie',
    'post_content' => 'Zagreb, la capitale de la Croatie, est une ville dynamique offrant une richesse culturelle à moindre coût. Explorez le centre-ville pour découvrir des places animées, des bâtiments historiques et des parcs verdoyants. Visitez des musées fascinants comme le musée d\'art contemporain et le musée des relations rompues. Dégustez des spécialités croates dans les restaurants locaux à des prix abordables. Avec ses nombreux hôtels économiques et ses transports publics peu coûteux, Zagreb est une destination abordable pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Bucarest, Roumanie',
    'post_content' => 'Bucarest, la capitale de la Roumanie, est une ville éclectique offrant une richesse architecturale et culturelle à petit prix. Explorez le quartier historique pour admirer ses bâtiments Belle Époque, ses églises orthodoxes et ses parcs verdoyants. Visitez des sites emblématiques comme le palais du Parlement et l\'arc de Triomphe. Dégustez des spécialités roumaines dans les restaurants locaux à des prix abordables. Avec ses nombreuses auberges bon marché et ses attractions gratuites, Bucarest est une destination économique pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Belgrade, Serbie',
    'post_content' => 'Belgrade, la capitale de la Serbie, est une ville animée offrant une riche histoire et une scène culturelle dynamique à petit prix. Explorez la forteresse de Belgrade, le cœur historique de la ville, avec ses remparts médiévaux et ses vues panoramiques. Visitez des musées fascinants comme le musée national et le musée d\'histoire de la Yougoslavie. Dégustez des spécialités serbes dans les kafanas traditionnelles à des prix abordables. Avec ses nombreux hôtels bon marché et ses options de divertissement abordables, Belgrade est une destination accessible pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Vilnius, Lituanie',
    'post_content' => 'Vilnius, la capitale de la Lituanie, est une ville charmante offrant une riche histoire et une atmosphère animée à moindre coût. Promenez-vous dans la vieille ville médiévale pour admirer ses églises baroques, ses places pittoresques et ses ruelles pavées. Visitez des sites historiques comme la cathédrale de Vilnius et la tour de Gediminas. Dégustez des plats lituaniens traditionnels dans les restaurants locaux à des prix abordables. Avec ses nombreuses auberges bon marché et ses transports publics peu coûteux, Vilnius est une destination abordable pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Riga, Lettonie',
    'post_content' => 'Riga, la capitale de la Lettonie, est une ville dynamique offrant une richesse culturelle et historique à petit prix. Explorez la vieille ville avec ses bâtiments médiévaux, ses églises anciennes et ses places animées. Visitez des musées fascinants comme le musée de l\'occupation et le musée d\'art letton. Dégustez des spécialités lettones dans les restaurants locaux à des prix abordables. Avec ses nombreux hôtels économiques et ses options de divertissement abordables, Riga est une destination accessible pour les voyageurs.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

$article[] = array(
    'post_title' => 'Malaga, Espagne',
    'post_content' => 'Malaga, située sur la magnifique Costa del Sol en Espagne, est une destination économique offrant une combinaison parfaite de plages ensoleillées, de culture vibrante et de délices gastronomiques. Explorez le centre historique de la ville pour découvrir des rues étroites pleines de charme, des places animées et des monuments historiques. Visitez des sites emblématiques comme l\'Alcazaba de Malaga et la cathédrale de Malaga. Détendez-vous sur les plages de sable doré de la Costa del Sol et profitez du soleil méditerranéen. Dégustez des tapas traditionnelles et des fruits de mer frais dans les bars et restaurants locaux à des prix abordables. Avec ses nombreux hôtels bon marché et ses options de divertissement peu coûteuses, Malaga est une destination idéale pour les voyageurs soucieux de leur budget.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(7) // Remplacez 7 par l'ID de la catégorie "économique"
);

// Catégorie croisière

$articles[] = array(
    'post_title' => 'Méditerranée orientale',
    'post_content' => 'La Méditerranée orientale offre une croisière fascinante à travers des destinations riches en histoire, en culture et en paysages spectaculaires. Explorez des villes emblématiques comme Athènes, Istanbul, Dubrovnik et Santorin, découvrez des sites archéologiques fascinants, profitez des plages de sable doré et dégustez une délicieuse cuisine méditerranéenne tout en naviguant sur les eaux cristallines de la mer Égée et de l\'Adriatique.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Caraïbes orientales',
    'post_content' => 'Les Caraïbes orientales offrent une croisière idyllique dans des îles paradisiaques telles que Sainte-Lucie, Saint-Martin, Porto Rico et les îles Vierges américaines. Détendez-vous sur des plages de sable blanc, plongez dans des eaux turquoises, explorez des villages pittoresques et profitez des activités nautiques comme la plongée avec tuba et la voile tout en découvrant la riche culture caribéenne.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Alaska',
    'post_content' => 'Une croisière en Alaska vous emmène dans un voyage époustouflant à travers des fjords majestueux, des glaciers imposants et une faune sauvage spectaculaire. Admirez les baleines à bosse, les lions de mer et les ours bruns tout en naviguant le long de la côte accidentée de l\'Alaska. Explorez des ports pittoresques comme Juneau, Ketchikan et Skagway, et découvrez la culture autochtone des Tlingits et des Haïdas.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Îles grecques',
    'post_content' => 'Une croisière dans les îles grecques vous transporte dans un monde de mythes et de légendes, avec des escales dans des îles emblématiques comme Mykonos, Santorin, Rhodes et Corfou. Imprégnez-vous du charme pittoresque des villages blancs aux toits bleus, explorez des sites archéologiques anciens comme le palais de Knossos et dégustez une cuisine méditerranéenne authentique dans des tavernes pittoresques au bord de la mer.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Caraïbes occidentales',
    'post_content' => 'Les Caraïbes occidentales offrent une croisière exotique à travers des destinations ensoleillées comme la Jamaïque, les îles Caïmans, Cozumel et Belize. Plongez dans des eaux cristallines pour explorer des récifs coralliens colorés, visitez des ruines mayas millénaires, goûtez des spécialités culinaires locales et dansez au rythme du reggae et du calypso dans des ports animés.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Tahiti et ses îles',
    'post_content' => 'Une croisière en Polynésie française vous emmène dans un paradis tropical préservé, avec des escales dans des îles enchanteresses comme Tahiti, Bora Bora, Moorea et Raiatea. Plongez dans des lagons turquoise, découvrez des jardins de corail éblouissants, explorez des vallées luxuriantes et des cascades tropicales, et imprégnez-vous de la culture polynésienne lors de spectacles de danse traditionnelle.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);



$articles[] = array(
    'post_title' => 'Rivière Yangtsé, Chine',
    'post_content' => 'La croisière sur la rivière Yangtsé en Chine est une expérience inoubliable qui vous permet de découvrir la beauté naturelle et la richesse culturelle de ce pays fascinant. Naviguez le long du plus long fleuve d\'Asie, admirez les paysages spectaculaires des Trois Gorges, visitez des villes historiques comme Chongqing et Wuhan, et découvrez la cuisine délicieuse de la région. Une croisière sur la rivière Yangtsé est une façon unique de découvrir la Chine sous un angle différent.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Dubai, Émirats arabes unis',
    'post_content' => 'Une croisière à Dubai vous plonge dans un monde de luxe, de modernité et de splendeur architecturale. Admirez les gratte-ciel futuristes de la ville, explorez des îles artificielles comme Palm Jumeirah et The World, découvrez des souks traditionnels et des marchés animés, et profitez de plages de sable doré et d\'activités nautiques dans le golfe Persique.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Croisière sur le Nil, Égypte',
    'post_content' => 'Une croisière sur le Nil vous emmène dans un voyage à travers l\'histoire ancienne de l\'Égypte, avec des escales dans des sites emblématiques comme Louxor, Karnak, Edfou, Kom Ombo et Assouan. Explorez les temples majestueux, les tombes des pharaons et les vestiges des anciennes civilisations égyptiennes le long des rives du Nil, et découvrez la richesse culturelle et artistique de cette région fascinante.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);

$articles[] = array(
    'post_title' => 'Croisière sur le Danube',
    'post_content' => 'Une croisière sur le Danube vous permet de découvrir les charmes pittoresques de l\'Europe centrale, avec des escales dans des villes emblématiques comme Vienne, Budapest, Bratislava et Prague. Naviguez à travers des paysages vallonnés, des châteaux médiévaux et des vignobles verdoyants, explorez des marchés traditionnels et des palais somptueux, et imprégnez-vous de la culture et de l\'histoire riches de cette région.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(8) // catégorie croisière
);



$article[] = array(

        'post_title' => 'Dubai, Émirats arabes unis',
        'post_content' => 'Une croisière à Dubai vous plonge dans un monde de luxe, de modernité et de splendeur architecturale. Admirez les gratte-ciel futuristes de la ville, explorez des îles artificielles comme Palm Jumeirah et The World, découvrez des souks traditionnels et des marchés animés, et profitez de plages de sable doré et d\'activités nautiques dans le golfe Persique.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(8) // catégorie croisière
);
$article[] =     array(
        'post_title' => 'Croisière sur le Nil, Égypte',
        'post_content' => 'Une croisière sur le Nil vous emmène dans un voyage à travers l\'histoire ancienne de l\'Égypte, avec des escales dans des sites emblématiques comme Louxor, Karnak, Edfou, Kom Ombo et Assouan. Explorez les temples majestueux, les tombes des pharaons et les vestiges des anciennes civilisations égyptiennes le long des rives du Nil, et découvrez la richesse culturelle et artistique de cette région fascinante.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(8) // catégorie croisière
);
$article[] =     array(
        'post_title' => 'Croisière sur le Danube',
        'post_content' => 'Une croisière sur le Danube vous permet de découvrir les charmes pittoresques de l\'Europe centrale, avec des escales dans des villes emblématiques comme Vienne, Budapest, Bratislava et Prague. Naviguez à travers des paysages vallonnés, des châteaux médiévaux et des vignobles verdoyants, explorez des marchés traditionnels et des palais somptueux, et imprégnez-vous de la culture et de l\'histoire riches de cette région.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(8) // catégorie croisière
);
$article[] =     array(
        'post_title' => 'Hawaï',
        'post_content' => 'Une croisière à Hawaï vous transporte dans un paradis tropical de plages de sable doré, de volcans actifs et de paysages spectaculaires. Explorez des îles exotiques comme Oahu, Maui, Kauai et l\'île d\'Hawaï, découvrez des parcs nationaux, des jardins botaniques et des sanctuaires marins, et profitez d\'activités nautiques comme le surf, la plongée avec tuba et la voile dans les eaux cristallines de l\'océan Pacifique.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(8) // catégorie croisière
    );
$article[] =     array(
        'post_title' => 'Croisière sur le Mékong, Vietnam',
        'post_content' => 'Une croisière sur le Mékong vous offre l\'opportunité de découvrir la beauté naturelle et la richesse culturelle du Vietnam et du Cambodge. Parcourez les eaux tranquilles du Mékong à bord d\'une jonque traditionnelle, visitez des villages flottants, des marchés animés et des temples bouddhistes millénaires, et explorez des paysages pittoresques de rizières verdoyantes, de jungles luxuriantes et de montagnes imposantes.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_category' => array(8) // catégorie croisière
);


// catégorie nature

$articles[] = array(
    'post_title' => 'Costa Rica',
    'post_content' => 'Le Costa Rica est un véritable paradis pour les amoureux de la nature, avec ses forêts tropicales luxuriantes, ses volcans actifs, ses plages immaculées et sa biodiversité exceptionnelle. Explorez des parcs nationaux comme Manuel Antonio, Tortuguero et Corcovado, où vous pourrez observer une grande variété d\'animaux sauvages, dont des singes, des paresseux, des toucans et des jaguars. Partez en randonnée à travers des sentiers pittoresques, faites de l\'observation des oiseaux, du rafting en eaux vives et de la tyrolienne au-dessus de la canopée, et détendez-vous sur des plages isolées bordées de palmiers.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Yellowstone National Park, États-Unis',
    'post_content' => 'Yellowstone est le plus ancien parc national au monde et abrite une diversité incroyable d\'écosystèmes et de paysages naturels. Découvrez des geysers spectaculaires comme Old Faithful, des sources chaudes colorées, des canyons profonds et des rivières sauvages. Observez une faune abondante, notamment des bisons, des élans, des cerfs, des ours et des loups. Explorez des sentiers de randonnée, faites du camping, de la pêche et du kayak dans ce véritable sanctuaire de la nature.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national de Banff, Canada',
    'post_content' => 'Niché au cœur des Rocheuses canadiennes, le parc national de Banff est un véritable joyau naturel. Admirez des sommets enneigés, des lacs d\'un bleu azur, des glaciers imposants et des vallées verdoyantes. Explorez des sentiers de randonnée, des pistes de ski et des pistes cyclables, et découvrez une faune sauvage variée, dont des ours, des wapitis, des loups et des orignaux. Visitez des attractions emblématiques comme le lac Louise, le lac Moraine et la ville pittoresque de Banff.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national de Torres del Paine, Chili',
    'post_content' => 'Situé au sud du Chili, le parc national de Torres del Paine est réputé pour ses paysages époustouflants, ses montagnes majestueuses, ses glaciers imposants et ses lacs cristallins. Parcourez des sentiers de randonnée spectaculaires, comme le célèbre circuit de la W, qui vous emmène à travers des vallées profondes, des forêts denses et des sommets enneigés. Observez une faune variée, dont des guanacos, des condors, des renards et des pumas, et découvrez la magie et la beauté sauvage de ce parc emblématique.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Fiordland National Park, Nouvelle-Zélande',
    'post_content' => 'Le parc national de Fiordland, situé dans le sud-ouest de l\'île du Sud de la Nouvelle-Zélande, est un paradis préservé de fjords spectaculaires, de montagnes escarpées et de forêts primaires. Explorez des fjords emblématiques comme le Milford Sound et le Doubtful Sound, où vous pourrez admirer des cascades vertigineuses, des falaises abruptes et une vie marine abondante. Partez en randonnée sur des sentiers isolés, comme le célèbre Milford Track, et découvrez une nature sauvage et préservée à chaque tournant.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Amazon Rainforest, Brésil',
    'post_content' => 'L\'Amazonie est la plus grande forêt tropicale du monde, abritant une biodiversité exceptionnelle et une beauté naturelle incomparable. Explorez des écosystèmes divers, des marécages et des rivières sinueuses, et découvrez une incroyable variété de plantes, d\'animaux et d\'oiseaux, dont des singes, des jaguars, des toucans et des perroquets. Partez en excursion en bateau dans la jungle, faites de la randonnée dans la canopée, rencontrez des communautés indigènes et découvrez la magie et la splendeur de cette forêt primaire.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national des Galápagos, Équateur',
    'post_content' => 'Les îles Galápagos, situées dans l\'océan Pacifique, sont un véritable laboratoire vivant de biodiversité et d\'évolution. Explorez des paysages uniques, des plages de sable blanc, des lagons turquoise et des volcans actifs, et découvrez une faune extraordinaire, dont des tortues géantes, des iguanes marins, des otaries, des pingouins et des albatros. Faites de la plongée avec tuba ou de la plongée sous-marine pour découvrir des récifs coralliens spectaculaires et une vie marine abondante, et découvrez la magie et la diversité des îles Galápagos.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national de Yellowstone, États-Unis',
    'post_content' => 'Yellowstone est le plus ancien parc national au monde et abrite une diversité incroyable d\'écosystèmes et de paysages naturels. Découvrez des geysers spectaculaires comme Old Faithful, des sources chaudes colorées, des canyons profonds et des rivières sauvages. Observez une faune abondante, notamment des bisons, des élans, des cerfs, des ours et des loups. Explorez des sentiers de randonnée, faites du camping,',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national de Yosemite, États-Unis',
    'post_content' => 'Le parc national de Yosemite, en Californie, est réputé pour ses paysages emblématiques, ses falaises de granit vertigineuses, ses cascades spectaculaires et sa biodiversité exceptionnelle. Explorez des vallées verdoyantes, des forêts de séquoias géants et des prairies alpines parsemées de fleurs sauvages. Admirez des sites emblématiques comme El Capitan, Half Dome et Yosemite Falls, et découvrez une faune sauvage variée, dont des ours, des cerfs, des coyotes et des aigles. Partez en randonnée sur des sentiers pittoresques, faites du camping, de l\'escalade et de la pêche, et imprégnez-vous de la beauté naturelle de ce parc emblématique.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Îles Féroé',
    'post_content' => 'Les îles Féroé, situées dans l\'Atlantique Nord entre l\'Islande et la Norvège, offrent des paysages à couper le souffle, des falaises abruptes, des fjords pittoresques et des prairies verdoyantes. Explorez des sentiers de randonnée le long de la côte, où vous pourrez admirer des cascades majestueuses, des colonies d\'oiseaux marins et des villages pittoresques aux maisons colorées. Découvrez une culture riche et authentique, imprégnée de traditions vikings, de musique folklorique et de festivals locaux, et laissez-vous envoûter par la beauté sauvage et préservée de ces îles isolées.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);


$articles[] = array(
    'post_title' => 'Parc national de Jiuzhaigou, Chine',
    'post_content' => 'Niché dans les montagnes de la province du Sichuan, en Chine, le parc national de Jiuzhaigou est un véritable joyau naturel, célèbre pour ses paysages de conte de fées, ses lacs multicolores et ses cascades cristallines. Explorez des vallées verdoyantes, des forêts de pins, des prairies alpines et des sommets enneigés, et découvrez une faune variée, dont des pandas géants, des léopards des neiges et des takins. Admirez des sites emblématiques comme le lac Five Flower, la vallée des neuf villages et les chutes Nuorilang, et laissez-vous émerveiller par la beauté naturelle de ce parc enchanteur.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);


$articles[] = array(
    'post_title' => 'Parc national de Plitvice Lakes, Croatie',
    'post_content' => 'Le parc national des lacs de Plitvice, en Croatie, est célèbre pour ses cascades époustouflantes, ses lacs turquoise et sa végétation luxuriante. Explorez des sentiers de randonnée qui serpentent à travers des forêts denses, le long de rivières cristallines et au bord de lacs scintillants. Admirez des cascades spectaculaires comme Veliki Slap et Galovac, et découvrez une faune variée, dont des ours, des loups, des lynx et des cerfs. Explorez des grottes mystérieuses, des falaises escarpées et des points de vue panoramiques à couper le souffle, et découvrez la magie et la beauté de ce parc national préservé.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national des Cinque Terre, Italie',
    'post_content' => 'Situé sur la côte nord-ouest de l\'Italie, le parc national des Cinque Terre est célèbre pour ses villages pittoresques perchés sur des falaises escarpées, ses sentiers de randonnée spectaculaires et ses vues imprenables sur la mer Méditerranée. Explorez des villages colorés comme Monterosso al Mare, Vernazza et Riomaggiore, où vous pourrez déguster une cuisine délicieuse, découvrir l\'artisanat local et vous imprégner de l\'atmosphère authentique de la région. Parcourez des sentiers de randonnée qui serpentent à travers des vignobles en terrasse, des oliveraies et des forêts méditerranéennes, et découvrez une nature préservée et une culture riche qui vous enchanteront à chaque tournant.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);

$articles[] = array(
    'post_title' => 'Parc national de Torres del Paine, Chili',
    'post_content' => 'Situé au sud du Chili, le parc national de Torres del Paine est réputé pour ses paysages époustouflants, ses montagnes majestueuses, ses glaciers imposants et ses lacs cristallins. Parcourez des sentiers de randonnée spectaculaires, comme le célèbre circuit de la W, qui vous emmène à travers des vallées profondes, des forêts denses et des sommets enneigés. Observez une faune variée, dont des guanacos, des condors, des renards et des pumas, et découvrez la magie et la beauté sauvage de ce parc emblématique.',
    'post_status' => 'publish',
    'post_type' => 'post',
    'post_category' => array(9) // catégorie nature
);


/*
A partir de la liste de destination en commentaire convertir cette liste en élément de tableau qui seront ajouté au tableau $articles.  'post_category' => array(8) // catégorie croisière. laliste commence avec Dubai, Émirats arabes unis. il faut inclure toutes les destination
*/



$articles = array_map("unserialize", array_unique(array_map("serialize", $articles)));

// Ajouter les articles à la base de données
foreach ($articles as $article) {
    wp_insert_post($article);
}

// Afficher un message de succès
echo 'Articles ajoutés avec succès.';




/*
'post_title' => 'Interlaken, Suisse',
'post_title' => 'Costa Rica',
'post_title' => 'Patagonie, Argentine',
'post_title' => 'Chamonix, France',
'post_title' => 'Mont Fuji, Japon',
'post_title' => 'Banff National Park, Canada',
'post_title' => 'Torres del Paine, Chili',
'post_title' => 'Santorin, Grèce',
'post_title' => 'Yangshuo, Chine',
'post_title' => 'Paris, France',
'post_title' => 'Londres, Royaume-Uni',
'post_title' => 'Florence, Italie',
'post_title' => 'Vienne, Autriche',
'post_title' => 'Prague, République tchèque',
'post_title' => 'Saint-Pétersbourg, Russie',
'post_title' => 'Kyoto, Japon',
'post_title' => 'Rome, Italie',
'post_title' => 'Prague, République tchèque',
'post_title' => 'Santorin, Grèce',
'post_title' => 'Kyoto, Japon',
'post_title' => 'Dubrovnik, Croatie',
'post_title' => 'Queenstown, Nouvelle-Zélande',
'post_title' => 'Luang Prabang, Laos',
'post_title' => 'Bruges, Belgique',
'post_title' => 'Chefchaouen, Maroc',
'post_title' => 'Ubud, Bali',
'post_title' => 'Rishikesh, Inde',
'post_title' => 'Tulum, Mexique',
'post_title' => 'Santorin, Grèce',
'post_title' => 'Napa Valley, Californie',
'post_title' => 'Kyoto, Japon',
'post_title' => 'Whistler, Canada',
'post_title' => 'Bora Bora, Polynésie française',
'post_title' => 'Interlaken, Suisse',
'post_title' => 'Cancún, Mexique',
'post_title' => 'Queenstown, Nouvelle-Zélande',
'post_title' => 'Kona, Hawaï',
'post_title' => 'Arosa, Suisse',
'post_title' => 'Bariloche, Argentine',
'post_title' => 'La Costa Brava, Espagne',
'post_title' => 'Kyoto, Japon',
'post_title' => 'Whistler, Canada',
'post_title' => 'Bora Bora, Polynésie française',
'post_title' => 'Interlaken, Suisse',
'post_title' => 'Cancún, Mexique',
'post_title' => 'Queenstown, Nouvelle-Zélande',
'post_title' => 'Kona, Hawaï',
'post_title' => 'Arosa, Suisse',
'post_title' => 'Bariloche, Argentine',
'post_title' => 'La Costa Brava, Espagne',
'post_title' => 'Moab, Utah, États-Unis',
'post_title' => 'Whitsunday Islands, Australie',
'post_title' => 'Chamonix, France',
'post_title' => 'Lake Tahoe, Californie/Nevada, États-Unis',
'post_title' => 'Interlaken, Suisse',
'post_title' => 'Hanoï, Vietnam',
'post_title' => 'Mexico, Mexique',
'post_title' => 'Le Caire, Égypte',
'post_title' => 'Bariloche, Argentine',
'post_title' => 'La Costa Brava, Espagne',
'post_title' => 'Moab, Utah, États-Unis',
'post_title' => 'Whitsunday Islands, Australie',
'post_title' => 'Lake Tahoe, Californie/Nevada, États-Unis',
'post_title' => 'Interlaken, Suisse',
'post_title' => 'Malaga, Espagne',
'post_title' => 'Hanoï, Vietnam',
'post_title' => 'Mexico, Mexique',
'post_title' => 'Le Caire, Égypte',
'post_title' => 'Siem Reap, Cambodge',
'post_title' => 'Sofia, Bulgarie',
'post_title' => 'Ho Chi Minh-Ville, Vietnam',
'post_title' => 'Lviv, Ukraine',
'post_title' => 'Tallinn, Estonie',
'post_title' => 'Zagreb, Croatie',
'post_title' => 'Bucarest, Roumanie',
'post_title' => 'Belgrade, Serbie',
'post_title' => 'Vilnius, Lituanie',
'post_title' => 'Riga, Lettonie',
'post_title' => 'Malaga, Espagne',
'post_title' => 'Méditerranée orientale',
'post_title' => 'Caraïbes orientales',
'post_title' => 'Alaska',
'post_title' => 'Îles grecques',
'post_title' => 'Caraïbes occidentales',
'post_title' => 'Tahiti et ses îles',
'post_title' => 'Rivière Yangtsé, Chine',
'post_title' => 'Dubai, Émirats arabes unis',
'post_title' => 'Croisière sur le Nil, Égypte',
'post_title' => 'Croisière sur le Danube',
'post_title' => 'Dubai, Émirats arabes unis',
'post_title' => 'Croisière sur le Nil, Égypte',
'post_title' => 'Croisière sur le Danube',
'post_title' => 'Hawaï',
'post_title' => 'Croisière sur le Mékong, Vietnam',
'post_title' => 'Costa Rica',
'post_title' => 'Yellowstone National Park, États-Unis',
'post_title' => 'Parc national de Banff, Canada',
'post_title' => 'Parc national de Torres del Paine, Chili',
'post_title' => 'Fiordland National Park, Nouvelle-Zélande',
'post_title' => 'Amazon Rainforest, Brésil',
'post_title' => 'Parc national des Galápagos, Équateur',
'post_title' => 'Parc national de Yellowstone, États-Unis',
'post_title' => 'Parc national de Yosemite, États-Unis',
'post_title' => 'Îles Féroé',
'post_title' => 'Parc national de Jiuzhaigou, Chine',
'post_title' => 'Parc national de Plitvice Lakes, Croatie',
'post_title' => 'Parc national des Cinque Terre, Italie',
'post_title' => 'Parc national de Torres del Paine, Chili',
*/
?>