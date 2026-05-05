<?php
session_start();
include 'data.php';
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

if (isset($_POST['toggle_wishlist'])) {
    $place = $_POST['toggle_wishlist'];
    $country = $_POST['country'];

    if (in_array($place, $_SESSION['wishlist'])) {
        // remove
        $_SESSION['wishlist'] = array_values(array_diff($_SESSION['wishlist'], [$place]));
    } else {
        // add
        $_SESSION['wishlist'][] = $place;
    }
    header("Location: result.php?country=" . urlencode($country));
    exit;
}

$country = '';

if (isset($_GET['country'])) {
    $country = strtolower(trim($_GET['country']));
}
$data = [

"india" => [

[
"name"=>"Taj Mahal",
"image"=>"images/india/taj_mahal.jpg",
"rating"=>4.9,
"points"=>[
"One of the Seven Wonders of the World",
"Symbol of eternal love",
"White marble Mughal architecture",
"Best visited at sunrise"
],
"things_to_do"=>[
"Sunrise photography",
"Explore Agra Fort",
"Visit Mehtab Bagh",
"Local marble shopping"
],
"best_time"=>"October to March",
"hotels" => [
    ["name"=>"Hotel Saniya Palace","budget"=>"LOW","price"=>2500,"rating"=>4.5],
    ["name"=>"Hotel Sheela","budget"=>"LOW","price"=>3200,"rating"=>4.7],
    ["name"=>"Howard Plaza The Fern","budget"=>"MEDIUM","price"=>6500,"rating"=>4.4],
    ["name"=>"Crystal Sarovar Premiere","budget"=>"MEDIUM","price"=>7800,"rating"=>4.5],
    ["name"=>"ITC Mughal","budget"=>"HIGH","price"=>12000,"rating"=>4.8],
    ["name"=>"The Oberoi Amarvilas","budget"=>"HIGH","price"=>18000,"rating"=>5.0]
]
],

[
"name"=>"Jaipur",
"image"=>"images/india/jaipur.jpg",
"rating"=>4.7,
"points"=>[
"Pink City of India",
"Royal palaces and forts",
"Traditional bazaars",
"Rich Rajasthani culture"
],
"things_to_do"=>[
"Visit Amer Fort",
"Shop at Johari Bazaar",
"Explore City Palace",
"Enjoy cultural folk shows"
],
"best_time"=>"October to March",
"hotels" => [
    ["name"=>"Hotel Pearl Palace","budget"=>"LOW","price"=>2200,"rating"=>4.4],
    ["name"=>"Hotel Kalyan","budget"=>"LOW","price"=>2800,"rating"=>4.5],
    ["name"=>"Lemon Tree Premier Jaipur","budget"=>"MEDIUM","price"=>6500,"rating"=>4.6],
    ["name"=>"Hilton Jaipur","budget"=>"MEDIUM","price"=>7800,"rating"=>4.7],
    ["name"=>"Rambagh Palace","budget"=>"HIGH","price"=>18500,"rating"=>5.0],
    ["name"=>"The Oberoi Rajvilas","budget"=>"HIGH","price"=>21000,"rating"=>5.0]
]
],

[
"name"=>"Goa",
"image"=>"images/india/goa.jpg",
"rating"=>4.8,
"points"=>[
"Beautiful beaches",
"Nightlife and parties",
"Portuguese heritage",
"Water sports"
],
"things_to_do"=>[
"Scuba diving",
"Beach hopping",
"Cruise dinner",
"Parasailing"
],
"best_time"=>"November to February",
"hotels" => [
    ["name"=>"Hotel La Calypso","budget"=>"LOW","price"=>2800,"rating"=>4.3],
    ["name"=>"Resort Rio","budget"=>"LOW","price"=>3200,"rating"=>4.4],
    ["name"=>"Holiday Inn Candolim","budget"=>"MEDIUM","price"=>6500,"rating"=>4.6],
    ["name"=>"Radisson Blu Resort Goa","budget"=>"MEDIUM","price"=>7800,"rating"=>4.7],
    ["name"=>"W Goa","budget"=>"HIGH","price"=>16000,"rating"=>4.8],
    ["name"=>"Taj Exotica Resort & Spa","budget"=>"HIGH","price"=>22000,"rating"=>5.0]
]
],

[
"name"=>"Kerala",
"image"=>"images/india/kerala.jpg",
"rating"=>4.7,
"points"=>[
"Backwaters and houseboats",
"Lush green nature",
"Ayurvedic tourism",
"Peaceful environment"
],
"things_to_do"=>[
"Houseboat stay",
"Tea plantation visit",
"Ayurvedic spa",
"Wildlife safari"
],
"best_time"=>"September to March",
"hotels" => [
    ["name"=>"Green Palace Houseboat","budget"=>"LOW","price"=>3000,"rating"=>4.3],
    ["name"=>"Palm Tree Heritage","budget"=>"LOW","price"=>3500,"rating"=>4.4],
    ["name"=>"Abad Turtle Beach Resort","budget"=>"MEDIUM","price"=>6500,"rating"=>4.6],
    ["name"=>"Fragrant Nature Backwater Resort","budget"=>"MEDIUM","price"=>7800,"rating"=>4.7],
    ["name"=>"Kumarakom Lake Resort","budget"=>"HIGH","price"=>15000,"rating"=>4.8],
    ["name"=>"Taj Bekal Resort & Spa","budget"=>"HIGH","price"=>22000,"rating"=>5.0]
]
],

[
"name"=>"Varanasi",
"image"=>"images/india/varanasi.jpg",
"rating"=>4.6,
"points"=>[
"Spiritual capital of India",
"Ganga Aarti",
"Ancient temples",
"Cultural experience"
],
"things_to_do"=>[
"Attend evening Ganga Aarti",
"Boat ride on Ganges",
"Temple visits",
"Explore old ghats"
],
"best_time"=>"October to March",
"hotels" => [
    ["name"=>"Hotel Alka","budget"=>"LOW","price"=>2500,"rating"=>4.2],
    ["name"=>"Ganpati Guest House","budget"=>"LOW","price"=>3200,"rating"=>4.4],
    ["name"=>"Hotel Temple on Ganges","budget"=>"MEDIUM","price"=>6200,"rating"=>4.6],
    ["name"=>"Ramada Plaza by Wyndham","budget"=>"MEDIUM","price"=>7500,"rating"=>4.7],
    ["name"=>"Taj Ganges, Varanasi","budget"=>"HIGH","price"=>14000,"rating"=>4.8],
    ["name"=>"BrijRama Palace – A Heritage Hotel","budget"=>"HIGH","price"=>20000,"rating"=>5.0]
]
],

[
"name"=>"Manali",
"image"=>"images/india/manali.jpg",
"rating"=>4.7,
"points"=>[
"Snowy mountains",
"Adventure sports",
"Hill station views",
"Honeymoon destination"
],
"things_to_do"=>[
"Paragliding",
"Solang Valley visit",
"Rohtang Pass trip",
"River rafting"
],
"best_time"=>"October to February",
"hotels" => [
    ["name"=>"Hotel Mountain Top","budget"=>"LOW","price"=>2800,"rating"=>4.1],
    ["name"=>"Apple Country Resort","budget"=>"LOW","price"=>3500,"rating"=>4.3],
    ["name"=>"Snow Valley Resorts","budget"=>"MEDIUM","price"=>6000,"rating"=>4.5],
    ["name"=>"The Manali Inn","budget"=>"MEDIUM","price"=>7200,"rating"=>4.6],
    ["name"=>"Span Resort & Spa","budget"=>"HIGH","price"=>13000,"rating"=>4.8],
    ["name"=>"The Himalayan","budget"=>"HIGH","price"=>18000,"rating"=>4.9]
]
],

[
"name"=>"Ladakh",
"image"=>"images/india/ladakh.jpg",
"rating"=>4.9,
"points"=>[
"High altitude desert",
"Pangong Lake",
"Buddhist monasteries",
"Adventure biking"
],
"things_to_do"=>[
"Bike trip to Khardung La",
"Camping near Pangong Lake",
"Monastery visits",
"Stargazing"
],
"best_time"=>"May to September",
"hotels" => [
    ["name"=>"Zostel Ladakh","budget"=>"LOW","price"=>2600,"rating"=>4.3],
    ["name"=>"Hotel Asia","budget"=>"LOW","price"=>3200,"rating"=>4.4],
    ["name"=>"The Grand Dragon Ladakh","budget"=>"MEDIUM","price"=>6500,"rating"=>4.6],
    ["name"=>"Hotel Singge Palace","budget"=>"MEDIUM","price"=>7200,"rating"=>4.7],
    ["name"=>"The Abduz","budget"=>"HIGH","price"=>12000,"rating"=>4.8],
    ["name"=>"Chamba Camp Thiksey","budget"=>"HIGH","price"=>22000,"rating"=>4.9]
]
],

[
"name"=>"Rishikesh",
"image"=>"images/india/rishikesh.jpg",
"rating"=>4.6,
"points"=>[
"Yoga capital of world",
"River rafting",
"Spiritual experience",
"Adventure activities"
],
"things_to_do"=>[
"River rafting",
"Bungee jumping",
"Yoga retreat",
"Ganga Aarti"
],
"best_time"=>"September to April",
"hotels" => [
    ["name"=>"Hotel Ishan – A Riverside Retreat","budget"=>"LOW","price"=>2800,"rating"=>4.2],
    ["name"=>"Bunk Stay Rishikesh","budget"=>"LOW","price"=>3300,"rating"=>4.4],
    ["name"=>"Ganga Kinare – A Riverside Boutique Hotel","budget"=>"MEDIUM","price"=>6500,"rating"=>4.6],
    ["name"=>"Aloha On The Ganges","budget"=>"MEDIUM","price"=>7800,"rating"=>4.7],
    ["name"=>"Sterling Palm Bliss","budget"=>"HIGH","price"=>13000,"rating"=>4.8],
    ["name"=>"Taj Rishikesh Resort & Spa","budget"=>"HIGH","price"=>19000,"rating"=>4.9]
]
],

[
"name"=>"Udaipur",
"image"=>"images/india/udaipur.jpg",
"rating"=>4.7,
"points"=>[
"City of Lakes",
"Royal palaces",
"Romantic destination",
"Heritage architecture"
],
"things_to_do"=>[
"Boat ride on Lake Pichola",
"Visit City Palace",
"Explore Sajjangarh Fort",
"Sunset viewpoints"
],
"best_time"=>"October to March",
"hotels" => [
    ["name"=>"Hotel Madri Haveli","budget"=>"LOW","price"=>3000,"rating"=>4.3],
    ["name"=>"Hotel Lakend","budget"=>"LOW","price"=>3500,"rating"=>4.4],
    ["name"=>"Trident Udaipur","budget"=>"MEDIUM","price"=>7000,"rating"=>4.7],
    ["name"=>"Radisson Blu Udaipur Palace Resort & Spa","budget"=>"MEDIUM","price"=>8200,"rating"=>4.6],
    ["name"=>"The Oberoi Udaivilas","budget"=>"HIGH","price"=>18000,"rating"=>4.9],
    ["name"=>"Taj Lake Palace","budget"=>"HIGH","price"=>22000,"rating"=>5.0]
]
],

[
"name"=>"Mumbai",
"image"=>"images/india/mumbai.jpg",
"rating"=>4.5,
"points"=>[
"City of dreams",
"Bollywood culture",
"Marine Drive",
"Street food"
],
"things_to_do"=>[
"Gateway of India visit",
"Street food tour",
"Bollywood studio tour",
"Marine Drive sunset walk"
],
"best_time"=>"November to February",
"hotels" => [
    ["name"=>"Hotel Residency Fort","budget"=>"LOW","price"=>3200,"rating"=>4.2],
    ["name"=>"Hotel Suba Palace","budget"=>"LOW","price"=>3800,"rating"=>4.3],
    ["name"=>"The Gordon House Hotel","budget"=>"MEDIUM","price"=>7500,"rating"=>4.5],
    ["name"=>"ITC Grand Central","budget"=>"MEDIUM","price"=>8800,"rating"=>4.6],
    ["name"=>"The Taj Mahal Palace","budget"=>"HIGH","price"=>16000,"rating"=>4.8],
    ["name"=>"The St. Regis Mumbai","budget"=>"HIGH","price"=>19000,"rating"=>4.9]
]
]

],

"france" => [

[
"name"=>"Paris",
"image"=>"images/france/paris.jpg",
"rating"=>4.9,
"points"=>[
"Eiffel Tower and romantic vibe",
"World famous museums",
"Luxury shopping",
"Cafes and culture"
],
"things_to_do"=>[
"Seine river cruise",
"Louvre Museum visit",
"Montmartre walk",
"Eiffel Tower summit view"
],
"best_time"=>"April to June & September to October",
"hotels" => [
["name"=>"Hotel des Arts Montmartre","budget"=>"LOW","price"=>9000,"rating"=>4.4],
["name"=>"Ibis Paris Bastille Opera","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Le Six","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Pullman Paris Tour Eiffel","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Le Meurice","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Shangri-La Hotel Paris","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Nice",
"image"=>"images/france/nice_beach.jpg",
"rating"=>4.7,
"points"=>[
"Beautiful Mediterranean beach",
"French Riviera charm",
"Relaxing atmosphere",
"Seafood and cafes"
],
"things_to_do"=>[
"Promenade des Anglais walk",
"Beach relaxation",
"Old town exploration",
"Boat tours"
],
"best_time"=>"May to September",
"hotels" => [
["name"=>"Hotel Busby","budget"=>"LOW","price"=>8800,"rating"=>4.2],
["name"=>"Ibis Nice Centre Gare","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel West End Promenade","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Hyatt Regency Nice Palais de la Méditerranée","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Hotel Negresco","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Anantara Plaza Nice Hotel","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Lyon",
"image"=>"images/france/lyon_city.jpg",
"rating"=>4.6,
"points"=>[
"Gastronomy capital",
"Historic old town",
"Beautiful rivers",
"Cultural experience"
],
"things_to_do"=>[
"Food tasting tours",
"Explore Vieux Lyon",
"River cruise",
"Visit Basilica of Notre-Dame"
],
"best_time"=>"May to September",
"hotels" => [
["name"=>"Hotel du Simplon","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Lyon Centre Perrache","budget"=>"LOW","price"=>9800,"rating"=>4.3],
["name"=>"Hotel Carlton Lyon - MGallery","budget"=>"MEDIUM","price"=>15000,"rating"=>4.6],
["name"=>"Radisson Blu Hotel Lyon","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Villa Florentine","budget"=>"HIGH","price"=>30000,"rating"=>4.8],
["name"=>"InterContinental Lyon – Hotel Dieu","budget"=>"HIGH","price"=>34000,"rating"=>4.9]
]
],

[
"name"=>"Marseille",
"image"=>"images/france/marseille_port.jpg",
"rating"=>4.5,
"points"=>[
"Old port city",
"Mediterranean culture",
"Sea views",
"Historic forts"
],
"things_to_do"=>[
"Old Port walk",
"Boat trip to Calanques",
"Visit Château d’If",
"Seafood dining"
],
"best_time"=>"May to September",
"hotels" => [
["name"=>"Hotel Belle-Vue Vieux-Port","budget"=>"LOW","price"=>8200,"rating"=>4.2],
["name"=>"Ibis Marseille Centre Vieux-Port","budget"=>"LOW","price"=>9800,"rating"=>4.3],
["name"=>"New Hotel of Marseille","budget"=>"MEDIUM","price"=>15500,"rating"=>4.5],
["name"=>"Radisson Blu Hotel Marseille Vieux Port","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"InterContinental Marseille – Hotel Dieu","budget"=>"HIGH","price"=>30000,"rating"=>4.8],
["name"=>"Sofitel Marseille Vieux-Port","budget"=>"HIGH","price"=>34000,"rating"=>4.9]
]
],

[
"name"=>"Bordeaux",
"image"=>"images/france/bordeaux.jpg",
"rating"=>4.6,
"points"=>[
"Famous wine region",
"Beautiful architecture",
"Riverfront city",
"Calm lifestyle"
],
"things_to_do"=>[
"Wine tasting tour",
"Riverfront cycling",
"Historic square visits",
"Local market exploration"
],
"best_time"=>"May to October",
"hotels" => [
["name"=>"Hotel de la Presse Bordeaux","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Ibis Bordeaux Centre Meriadeck","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Konti by HappyCulture","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"Radisson Blu Hotel Bordeaux","budget"=>"MEDIUM","price"=>17800,"rating"=>4.7],
["name"=>"InterContinental Bordeaux – Le Grand Hotel","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Les Sources de Caudalie","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Provence",
"image"=>"images/france/provence.jpg",
"rating"=>4.7,
"points"=>[
"Lavender fields",
"Peaceful villages",
"Natural beauty",
"Relaxing travel"
],
"things_to_do"=>[
"Lavender field photography",
"Village hopping",
"Wine tours",
"Cycling countryside"
],
"best_time"=>"June to August",
"hotels" => [
["name"=>"Hotel Le Mas des Romarins","budget"=>"LOW","price"=>9200,"rating"=>4.2],
["name"=>"Hotel Les Bories & Spa (budget rooms)","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Crillon le Brave","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Villa Gallici","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Airelles Gordes, La Bastide","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Domaine de Fontenille","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Chamonix",
"image"=>"images/france/chamonix.jpg",
"rating"=>4.8,
"points"=>[
"Alps mountain views",
"Ski destination",
"Adventure sports",
"Nature lovers paradise"
],
"things_to_do"=>[
"Skiing",
"Mont Blanc cable car",
"Hiking trails",
"Paragliding"
],
"best_time"=>"December to March & June to September",
"hotels" => [
["name"=>"Hotel Le Chamonix","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"La Croix Blanche","budget"=>"LOW","price"=>10800,"rating"=>4.3],
["name"=>"Park Hotel Suisse & Spa","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Hôtel Mont-Blanc Chamonix","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Grand Hôtel des Alpes","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Les Granges d’en Haut","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Strasbourg",
"image"=>"images/france/strasbourg.jpg",
"rating"=>4.5,
"points"=>[
"Fairytale old town",
"European culture",
"Christmas markets",
"Historic canals"
],
"things_to_do"=>[
"Boat tour on canals",
"Christmas market visit",
"Strasbourg Cathedral climb",
"Petite France walk"
],
"best_time"=>"May to September & December",
"hotels" => [
["name"=>"Hotel des Vosges","budget"=>"LOW","price"=>8800,"rating"=>4.2],
["name"=>"Ibis Strasbourg Centre Gare","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Hannong","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"Maison Rouge Strasbourg Hotel & Spa","budget"=>"MEDIUM","price"=>17800,"rating"=>4.7],
["name"=>"Sofitel Strasbourg Grande Île","budget"=>"HIGH","price"=>30000,"rating"=>4.8],
["name"=>"Pavillon REGENT PETITE FRANCE","budget"=>"HIGH","price"=>34000,"rating"=>4.9]
]
],

[
"name"=>"Cannes",
"image"=>"images/france/cannes.jpg",
"rating"=>4.6,
"points"=>[
"Film festival city",
"Luxury beaches",
"Celebrity culture",
"Coastal beauty"
],
"things_to_do"=>[
"Beach relaxation",
"Luxury shopping",
"Boat yacht tours",
"Film festival venues visit"
],
"best_time"=>"May to September",
"hotels" => [
["name"=>"Hotel Amarante Cannes","budget"=>"LOW","price"=>9200,"rating"=>4.1],
["name"=>"Ibis Cannes Centre","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Barrière Le Gray d’Albion","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"JW Marriott Cannes","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Hotel Barrière Le Majestic Cannes","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Five Seas Hotel Cannes","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Mont Saint Michel",
"image"=>"images/france/mont_saint_michel.jpg",
"rating"=>4.9,
"points"=>[
"Iconic island monastery",
"Historic landmark",
"Unique tides view",
"UNESCO site"
],
"things_to_do"=>[
"Abbey tour",
"Tide photography",
"Island walking trails",
"Medieval streets exploration"
],
"best_time"=>"May to September",
"hotels" => [
["name"=>"Auberge de la Baie","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Vert","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Mercure Mont Saint Michel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Le Relais Saint Michel","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Auberge Saint-Pierre","budget"=>"HIGH","price"=>30000,"rating"=>4.8],
["name"=>"La Mère Poulard","budget"=>"HIGH","price"=>34000,"rating"=>4.9]
]
]

],

"italy" => [

[
"name"=>"Rome",
"image"=>"images/italy/rome_colosseum.jpg",
"rating"=>4.9,
"points"=>[
"Colosseum and Roman history",
"Vatican City",
"Ancient architecture",
"Italian street food"
],
"things_to_do"=>[
"Colosseum guided tour",
"Visit Vatican Museums",
"Toss coin at Trevi Fountain",
"Roman street food walk"
],
"best_time"=>"April to June & September to October",
"hotels"=>[
["name"=>"Hotel Grifo","budget"=>"LOW","price"=>9500,"rating"=>4.3],
["name"=>"Ibis Styles Roma Centro","budget"=>"LOW","price"=>11000,"rating"=>4.4],
["name"=>"Hotel Artemide","budget"=>"MEDIUM","price"=>16500,"rating"=>4.7],
["name"=>"NH Collection Roma Palazzo Cinquecento","budget"=>"MEDIUM","price"=>18500,"rating"=>4.6],
["name"=>"Hotel de Russie","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Rome Cavalieri, A Waldorf Astoria Hotel","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Venice",
"image"=>"images/italy/venice_canals.jpg",
"rating"=>4.8,
"points"=>[
"Romantic canals",
"Gondola rides",
"St. Mark’s Square",
"Unique water city"
],
"things_to_do"=>[
"Gondola ride",
"St. Mark’s Basilica visit",
"Murano island trip",
"Sunset canal walk"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Antico Panada","budget"=>"LOW","price"=>9800,"rating"=>4.2],
["name"=>"Hotel Belle Arti","budget"=>"LOW","price"=>11200,"rating"=>4.3],
["name"=>"Hotel Saturnia & International","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"NH Collection Venezia Grand Hotel dei Dogi","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Hotel Danieli","budget"=>"HIGH","price"=>34000,"rating"=>4.9],
["name"=>"The Gritti Palace","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Florence",
"image"=>"images/italy/florence_duomo.jpg",
"rating"=>4.8,
"points"=>[
"Renaissance art",
"Michelangelo’s David",
"Historic churches",
"Art museums"
],
"things_to_do"=>[
"Uffizi Gallery visit",
"Climb Florence Duomo",
"Ponte Vecchio walk",
"Accademia Gallery tour"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Dali","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Casci","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Calzaiuoli","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Hotel Santa Maria Novella","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"Hotel Brunelleschi","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Firenze","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Milan",
"image"=>"images/italy/milan_cathedral.jpg",
"rating"=>4.7,
"points"=>[
"Fashion capital",
"Duomo Cathedral",
"Luxury shopping",
"Modern city vibe"
],
"things_to_do"=>[
"Duomo rooftop view",
"Galleria Vittorio shopping",
"La Scala Opera House",
"Brera district walk"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Berna","budget"=>"LOW","price"=>9800,"rating"=>4.3],
["name"=>"Ibis Milano Centro","budget"=>"LOW","price"=>11200,"rating"=>4.2],
["name"=>"Hotel Spadari al Duomo","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"NH Collection Milano President","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Park Hyatt Milan","budget"=>"HIGH","price"=>34000,"rating"=>4.9],
["name"=>"Armani Hotel Milano","budget"=>"HIGH","price"=>39000,"rating"=>5.0]
]
],

[
"name"=>"Naples",
"image"=>"images/italy/naples_coast.jpg",
"rating"=>4.6,
"points"=>[
"Birthplace of pizza",
"Mount Vesuvius",
"Historic streets",
"Seafood cuisine"
],
"things_to_do"=>[
"Mount Vesuvius hike",
"Pompeii day trip",
"Pizza tasting tour",
"Naples waterfront walk"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Europeo Napoli","budget"=>"LOW","price"=>9000,"rating"=>4.1],
["name"=>"Hotel Ideal Boutique","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"UNAHOTELS Napoli","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Grand Hotel Oriente","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"Grand Hotel Vesuvio","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Romeo Hotel","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Pisa",
"image"=>"images/italy/leaning_tower_pisa.jpg",
"rating"=>4.5,
"points"=>[
"Leaning Tower of Pisa",
"Historic monuments",
"University town",
"Photography spot"
],
"things_to_do"=>[
"Climb Leaning Tower",
"Piazza dei Miracoli tour",
"Cathedral visit",
"Photo session"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Roma Pisa","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel Di Stefano","budget"=>"LOW","price"=>9800,"rating"=>4.3],
["name"=>"Hotel Bologna","budget"=>"MEDIUM","price"=>15000,"rating"=>4.6],
["name"=>"NH Pisa","budget"=>"MEDIUM","price"=>17000,"rating"=>4.7],
["name"=>"Bagni di Pisa Palace & Thermal Spa","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"San Ranieri Hotel","budget"=>"HIGH","price"=>34000,"rating"=>4.8]
]
],

[
"name"=>"Cinque Terre",
"image"=>"images/italy/cinque_terre.jpg",
"rating"=>4.8,
"points"=>[
"Colorful coastal villages",
"Sea views",
"Hiking trails",
"Photography paradise"
],
"things_to_do"=>[
"Village hopping",
"Coastal hiking",
"Boat tour",
"Sunset photography"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Souvenir Monterosso","budget"=>"LOW","price"=>9500,"rating"=>4.3],
["name"=>"Affittacamere Da Cesare","budget"=>"LOW","price"=>11000,"rating"=>4.4],
["name"=>"Hotel Palme Monterosso","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Hotel Porto Roca","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Grand Hotel Portovenere","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Hotel Palme Exclusive Sea View","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Lake Como",
"image"=>"images/italy/lake_como.jpg",
"rating"=>4.9,
"points"=>[
"Luxury lake views",
"Mountain scenery",
"Romantic destination",
"Celebrity favorite"
],
"things_to_do"=>[
"Boat cruise",
"Villa visits",
"Mountain hiking",
"Sunset lakeside dinner"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Engadina","budget"=>"LOW","price"=>10500,"rating"=>4.2],
["name"=>"Hotel Bellavista","budget"=>"LOW","price"=>12000,"rating"=>4.3],
["name"=>"Hotel Barchetta Excelsior","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Palace Hotel Como","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Grand Hotel Tremezzo","budget"=>"HIGH","price"=>35000,"rating"=>4.9],
["name"=>"Villa d’Este","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Sicily",
"image"=>"images/italy/sicily_island.jpg",
"rating"=>4.6,
"points"=>[
"Beautiful beaches",
"Volcano Mount Etna",
"Rich history",
"Mediterranean food"
],
"things_to_do"=>[
"Mount Etna tour",
"Beach hopping",
"Ancient ruins visit",
"Seafood tasting"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"Hotel Columbia Palermo","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Villa Romeo","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Eurostars Centrale Palace","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"NH Collection Palermo Palazzo Sitano","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"Belmond Grand Hotel Timeo","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"San Domenico Palace, Taormina","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Verona",
"image"=>"images/italy/verona_city.jpg",
"rating"=>4.5,
"points"=>[
"Romeo & Juliet city",
"Historic arena",
"Romantic atmosphere",
"Old town charm"
],
"things_to_do"=>[
"Juliet’s balcony visit",
"Verona Arena tour",
"Old town walk",
"Romantic evening stroll"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Giulietta e Romeo","budget"=>"LOW","price"=>8800,"rating"=>4.3],
["name"=>"Hotel Scalzi","budget"=>"LOW","price"=>10200,"rating"=>4.2],
["name"=>"Hotel Accademia","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"NH Collection Palazzo Verona","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Due Torri Hotel","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Vista Palazzo Verona","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
]

],

"spain" => [

[
"name"=>"Barcelona",
"image"=>"images/spain/barcelona_sagrada_familia.jpg",
"rating"=>4.8,
"points"=>[
"Gaudi architecture",
"Beautiful beaches",
"Vibrant nightlife",
"Rich Catalan culture"
],
"things_to_do"=>[
"Sagrada Familia tour",
"La Rambla walk",
"Beach relaxation",
"Park Güell visit"
],
"best_time"=>"May to June & September",
"hotels"=>[
["name"=>"Hotel Lloret Ramblas","budget"=>"LOW","price"=>9200,"rating"=>4.2],
["name"=>"Hotel Acta Antibes","budget"=>"LOW","price"=>10800,"rating"=>4.3],
["name"=>"Hotel Jazz Barcelona","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"H10 Madison","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"W Barcelona","budget"=>"HIGH","price"=>34000,"rating"=>4.9],
["name"=>"Hotel Arts Barcelona","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Madrid",
"image"=>"images/spain/madrid_city.jpg",
"rating"=>4.7,
"points"=>[
"Royal Palace",
"World-class museums",
"Football culture",
"Lively city life"
],
"things_to_do"=>[
"Royal Palace visit",
"Prado Museum tour",
"Bernabeu Stadium tour",
"Tapas tasting"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Mediodia","budget"=>"LOW","price"=>9000,"rating"=>4.1],
["name"=>"Ibis Madrid Centro","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Catalonia Gran Via","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"NH Collection Madrid Suecia","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"The Westin Palace Madrid","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Mandarin Oriental Ritz Madrid","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Seville",
"image"=>"images/spain/seville_cathedral.jpg",
"rating"=>4.6,
"points"=>[
"Flamenco dance",
"Historic cathedrals",
"Spanish traditions",
"Colorful streets"
],
"things_to_do"=>[
"Flamenco show",
"Seville Cathedral tour",
"Alcazar Palace visit",
"Old town exploration"
],
"best_time"=>"March to May",
"hotels"=>[
["name"=>"Hotel Simon","budget"=>"LOW","price"=>8800,"rating"=>4.2],
["name"=>"Hotel Don Paco","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Becquer","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"Hotel Alfonso XIII, A Luxury Collection Hotel","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"CoolRooms Palacio Villapanés","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Eme Catedral Mercer Hotel","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Valencia",
"image"=>"images/spain/valencia_city.jpg",
"rating"=>4.5,
"points"=>[
"City of Arts & Science",
"Paella birthplace",
"Mediterranean beaches",
"Modern architecture"
],
"things_to_do"=>[
"City of Arts visit",
"Beach day",
"Paella tasting",
"Oceanografic aquarium"
],
"best_time"=>"April to June",
"hotels"=>[
["name"=>"Hotel Malcom and Barret","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Casual del Cine Valencia","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Dimar","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"SH Valencia Palace","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Las Arenas Balneario Resort","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Only YOU Hotel Valencia","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Granada",
"image"=>"images/spain/granada_alhambra.jpg",
"rating"=>4.7,
"points"=>[
"Alhambra Palace",
"Moorish architecture",
"Mountain views",
"Historic charm"
],
"things_to_do"=>[
"Alhambra guided tour",
"Mirador sunset view",
"Sierra Nevada trip",
"Arab baths experience"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Monjas del Carmen","budget"=>"LOW","price"=>8800,"rating"=>4.2],
["name"=>"Hotel Casa Morisca","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Saray","budget"=>"MEDIUM","price"=>15500,"rating"=>4.5],
["name"=>"Hotel Alhambra Palace","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"Parador de Granada","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Hotel Palacio de Santa Paula","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Ibiza",
"image"=>"images/spain/ibiza_island.jpg",
"rating"=>4.6,
"points"=>[
"Party island",
"Crystal clear beaches",
"Luxury resorts",
"Sunset views"
],
"things_to_do"=>[
"Beach clubs",
"Boat cruise",
"Sunset at Es Vedra",
"Night parties"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Playasol Mare Nostrum","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"Hotel Vibra Algarb","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Hotel THB Los Molinos","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Ushuaïa Ibiza Beach Hotel","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Nobu Hotel Ibiza Bay","budget"=>"HIGH","price"=>34000,"rating"=>4.9],
["name"=>"Six Senses Ibiza","budget"=>"HIGH","price"=>38000,"rating"=>5.0]
]
],

[
"name"=>"Malaga",
"image"=>"images/spain/malaga_beach.jpg",
"rating"=>4.5,
"points"=>[
"Costa del Sol",
"Picasso birthplace",
"Beach city",
"Warm climate"
],
"things_to_do"=>[
"Beach relaxation",
"Picasso Museum visit",
"Alcazaba tour",
"Tapas crawl"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Sur Málaga","budget"=>"LOW","price"=>8800,"rating"=>4.1],
["name"=>"Ibis Malaga Centro Ciudad","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Molina Lario","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"AC Hotel Málaga Palacio","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Gran Hotel Miramar GL","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Vincci Selección Posada del Patio","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Bilbao",
"image"=>"images/spain/bilbao_guggenheim.jpg",
"rating"=>4.4,
"points"=>[
"Guggenheim Museum",
"Basque culture",
"Modern architecture",
"Riverfront views"
],
"things_to_do"=>[
"Guggenheim tour",
"River walk",
"Old town pintxos",
"Basque food tasting"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Hotel Bilbao Plaza","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Ibis Bilbao Centro","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Tayko Bilbao","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"NH Collection Villa de Bilbao","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Gran Hotel Domine Bilbao","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Radisson Collection Bilbao","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Toledo",
"image"=>"images/spain/toledo_old_city.jpg",
"rating"=>4.3,
"points"=>[
"Medieval city",
"UNESCO heritage",
"Historic streets",
"Cultural diversity"
],
"things_to_do"=>[
"Cathedral visit",
"Alcazar fortress",
"Medieval walking tour",
"Panoramic viewpoints"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Hotel Abad Toledo","budget"=>"LOW","price"=>8800,"rating"=>4.2],
["name"=>"Hotel Eurico","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Pintor El Greco","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"Parador de Toledo","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Hotel San Juan de los Reyes","budget"=>"HIGH","price"=>28000,"rating"=>4.8],
["name"=>"Eugenia de Montijo, Autograph Collection","budget"=>"HIGH","price"=>32000,"rating"=>4.9]
]
],

[
"name"=>"Cordoba",
"image"=>"images/spain/cordoba_mosque.jpg",
"rating"=>4.4,
"points"=>[
"Mezquita Mosque",
"Islamic architecture",
"Historic old town",
"Cultural heritage"
],
"things_to_do"=>[
"Mezquita tour",
"Roman bridge walk",
"Flower patio visit",
"Old town exploration"
],
"best_time"=>"April to June",
"hotels"=>[
["name"=>"Hotel Maestre","budget"=>"LOW","price"=>8500,"rating"=>4.1],
["name"=>"Hotel Eurostars Patios de Córdoba","budget"=>"LOW","price"=>10200,"rating"=>4.3],
["name"=>"Hotel Macià Alfaros","budget"=>"MEDIUM","price"=>15000,"rating"=>4.6],
["name"=>"NH Collection Amistad Córdoba","budget"=>"MEDIUM","price"=>17000,"rating"=>4.7],
["name"=>"Hospes Palacio del Bailío","budget"=>"HIGH","price"=>28000,"rating"=>4.9],
["name"=>"Balcón de Córdoba","budget"=>"HIGH","price"=>32000,"rating"=>5.0]
]
]

],
"united_states" => [

[
"name" => "New York City",
"image" => "images/united_states/new_york_times_square.jpg",
"rating" => 4.9,
"points" => [
"Statue of Liberty",
"Times Square",
"World-class museums",
"City that never sleeps"
],
"things_to_do" => [
"Watch Broadway shows",
"Walk through Central Park",
"Visit Empire State Building",
"Explore Brooklyn Bridge"
],
"best_time" => "April to June & September to November",
"hotels" => [
["name"=>"Pod 39","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Edison","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Arlo Midtown","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hyatt Grand Central New York","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Plaza Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The St. Regis New York","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Los Angeles",
"image" => "images/united_states/los_angeles_hollywood.jpg",
"rating" => 4.7,
"points" => [
"Hollywood sign",
"Celebrity culture",
"Beautiful beaches",
"Entertainment capital"
],
"things_to_do" => [
"Visit Universal Studios",
"Walk Hollywood Boulevard",
"Relax at Santa Monica Beach",
"Drive through Beverly Hills"
],
"best_time" => "March to May & September to November",
"hotels" => [
["name"=>"Freehand Los Angeles","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"The Line Hotel LA","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Loews Hollywood Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Andaz West Hollywood","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Beverly Hills Hotel","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Waldorf Astoria Beverly Hills","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name" => "Las Vegas",
"image" => "images/united_states/las_vegas_strip.jpg",
"rating" => 4.8,
"points" => [
"Luxury casinos",
"Nightlife & shows",
"Entertainment hub",
"Desert city vibes"
],
"things_to_do" => [
"Watch live shows",
"Casino experience",
"Helicopter tour over Strip",
"Visit Fremont Street"
],
"best_time" => "March to May & September to November",
"hotels" => [
["name"=>"Circus Circus Hotel & Casino","budget"=>"LOW","price"=>9500,"rating"=>4.1],
["name"=>"Excalibur Hotel & Casino","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"New York-New York Hotel & Casino","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"The Venetian Resort Las Vegas","budget"=>"MEDIUM","price"=>22000,"rating"=>4.7],
["name"=>"Bellagio Hotel & Casino","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Wynn Las Vegas","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name" => "San Francisco",
"image" => "images/united_states/san_francisco_golden_gate.jpg",
"rating" => 4.7,
"points" => [
"Golden Gate Bridge",
"Alcatraz Island",
"Tech capital",
"Scenic city views"
],
"things_to_do" => [
"Bike across Golden Gate",
"Visit Alcatraz Prison",
"Ride cable cars",
"Explore Fisherman's Wharf"
],
"best_time" => "September to November",
"hotels" => [
["name"=>"Hotel Zeppelin San Francisco","budget"=>"LOW","price"=>12500,"rating"=>4.2],
["name"=>"Hotel Bijou","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Hotel Nikko San Francisco","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hyatt Regency San Francisco","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Fairmont San Francisco","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Ritz-Carlton San Francisco","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Orlando",
"image" => "images/united_states/orlando_theme_parks.jpg",
"rating" => 4.6,
"points" => [
"Disney World",
"Theme parks",
"Family destination",
"Fun attractions"
],
"things_to_do" => [
"Visit Walt Disney World",
"Explore Universal Studios",
"SeaWorld experience",
"Water park adventures"
],
"best_time" => "March to May",
"hotels" => [
["name"=>"Rosen Inn International","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"La Quinta Inn & Suites Orlando","budget"=>"LOW","price"=>12500,"rating"=>4.3],
["name"=>"Hyatt Place Orlando / Lake Buena Vista","budget"=>"MEDIUM","price"=>20000,"rating"=>4.6],
["name"=>"Wyndham Lake Buena Vista Disney Springs","budget"=>"MEDIUM","price"=>23000,"rating"=>4.7],
["name"=>"Disney’s Grand Floridian Resort & Spa","budget"=>"HIGH","price"=>40000,"rating"=>4.9],
["name"=>"Four Seasons Resort Orlando at Walt Disney World","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Chicago",
"image" => "images/united_states/chicago_skyline.jpg",
"rating" => 4.6,
"points" => [
"Skyline architecture",
"Millennium Park",
"Deep-dish pizza",
"Lake Michigan views"
],
"things_to_do" => [
"Visit Cloud Gate (The Bean)",
"Architecture boat tour",
"Try deep-dish pizza",
"Walk Navy Pier"
],
"best_time" => "May to September",
"hotels" => [
["name"=>"Hotel Versey Days Inn by Wyndham","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Freehand Chicago","budget"=>"LOW","price"=>14000,"rating"=>4.3],
["name"=>"Palmer House a Hilton Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hyatt Regency Chicago","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Langham Chicago","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Chicago","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Miami",
"image" => "images/united_states/miami_beach.jpg",
"rating" => 4.7,
"points" => [
"South Beach",
"Nightlife & parties",
"Art Deco architecture",
"Tropical vibe"
],
"things_to_do" => [
"Relax at South Beach",
"Explore Wynwood Walls",
"Boat tours",
"Nightclub experience"
],
"best_time" => "December to April",
"hotels" => [
["name"=>"Freehand Miami","budget"=>"LOW","price"=>12500,"rating"=>4.2],
["name"=>"Hotel Shelley","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Loews Miami Beach Hotel","budget"=>"MEDIUM","price"=>24000,"rating"=>4.6],
["name"=>"Fontainebleau Miami Beach","budget"=>"MEDIUM","price"=>27000,"rating"=>4.7],
["name"=>"The Setai, Miami Beach","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Faena Hotel Miami Beach","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name" => "Washington DC",
"image" => "images/united_states/washington_dc_capitol.jpg",
"rating" => 4.5,
"points" => [
"White House",
"Historic monuments",
"Museums",
"Political capital"
],
"things_to_do" => [
"Tour the Capitol",
"Visit Smithsonian Museums",
"Walk National Mall",
"See Lincoln Memorial"
],
"best_time" => "March to May & September to November",
"hotels" => [
["name"=>"Hotel Harrington","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Pod DC","budget"=>"LOW","price"=>14000,"rating"=>4.3],
["name"=>"Washington Plaza Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hyatt Regency Washington on Capitol Hill","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Hay-Adams","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Washington DC","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Seattle",
"image" => "images/united_states/seattle.jpg",
"rating" => 4.4,
"points" => [
"Space Needle",
"Coffee culture",
"Tech hub",
"Natural scenery"
],
"things_to_do" => [
"Visit Space Needle",
"Explore Pike Place Market",
"Mount Rainier trip",
"Coffee tasting tours"
],
"best_time" => "July to September",
"hotels" => [
["name"=>"Green Tortoise Hostel Seattle","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Max","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"The Paramount Hotel Seattle","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hyatt Regency Seattle","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Fairmont Olympic Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Seattle","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name" => "Grand Canyon",
"image" => "images/united_states/grand_canyon.jpg",
"rating" => 4.9,
"points" => [
"Natural wonder",
"Breathtaking views",
"Adventure hiking",
"Scenic landscapes"
],
"things_to_do" => [
"Hike Bright Angel Trail",
"Helicopter tour",
"Sunset viewpoints",
"Rafting on Colorado River"
],
"best_time" => "March to May & September to November",
"hotels" => [
["name"=>"Maswik Lodge","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Yavapai Lodge","budget"=>"LOW","price"=>12500,"rating"=>4.3],
["name"=>"Red Feather Lodge","budget"=>"MEDIUM","price"=>20000,"rating"=>4.5],
["name"=>"Best Western Premier Grand Canyon Squire Inn","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"El Tovar Hotel","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"The Grand Hotel at the Grand Canyon","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
]

],
"united_kingdom" => [

[
"name"=>"London",
"image"=>"images/united_kingdom/london_big_ben.jpg",
"rating"=>4.9,
"points"=>[
"Big Ben & Parliament",
"London Eye views",
"World-class museums",
"Historic royal city"
],
"things_to_do"=>[
"Buckingham Palace visit",
"Thames river cruise",
"Tower of London tour",
"West End theatre show"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Point A Hotel London Paddington","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Ibis London Blackfriars","budget"=>"LOW","price"=>15000,"rating"=>4.3],
["name"=>"The Resident Covent Garden","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Park Plaza Westminster Bridge London","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"The Savoy","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"The Ritz London","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Edinburgh",
"image"=>"images/united_kingdom/edinburgh_castle.jpg",
"rating"=>4.8,
"points"=>[
"Edinburgh Castle",
"Historic old town",
"Scottish culture",
"Beautiful hill views"
],
"things_to_do"=>[
"Castle tour",
"Arthur’s Seat hike",
"Royal Mile walk",
"Whisky tasting"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Castle Rock Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Stay Central Hotel","budget"=>"LOW","price"=>13500,"rating"=>4.4],
["name"=>"Apex Grassmarket Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Radisson Blu Hotel Edinburgh","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Balmoral Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Cheval The Edinburgh Grand","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Manchester",
"image"=>"images/united_kingdom/manchester_city.jpg",
"rating"=>4.6,
"points"=>[
"Football culture",
"Music & nightlife",
"Industrial heritage",
"Modern city vibe"
],
"things_to_do"=>[
"Old Trafford tour",
"Etihad Stadium visit",
"Music district walk",
"Canal street nightlife"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis budget Manchester Centre Pollard Street","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"easyHotel Manchester","budget"=>"LOW","price"=>13000,"rating"=>4.3],
["name"=>"INNSiDE by Meliá Manchester","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hotel Gotham","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Lowry Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Edwardian Manchester, A Radisson Collection Hotel","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Liverpool",
"image"=>"images/united_kingdom/liverpool_albert_dock.jpg",
"rating"=>4.5,
"points"=>[
"Beatles heritage",
"Historic docks",
"Football clubs",
"Cultural city"
],
"things_to_do"=>[
"Beatles Story museum",
"Albert Dock walk",
"Anfield Stadium tour",
"Waterfront sunset"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Tune Hotel Liverpool","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Ibis Liverpool Centre Albert Dock","budget"=>"LOW","price"=>13000,"rating"=>4.3],
["name"=>"Staybridge Suites Liverpool","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Pullman Liverpool","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Titanic Hotel Liverpool","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Municipal Hotel and Spa Liverpool","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Oxford",
"image"=>"images/united_kingdom/oxford_university.jpg",
"rating"=>4.6,
"points"=>[
"World-famous university",
"Historic colleges",
"Beautiful libraries",
"Academic heritage"
],
"things_to_do"=>[
"College tours",
"Bodleian Library visit",
"Punting on river",
"Harry Potter filming spots"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Central Backpackers Oxford","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Royal Oxford Hotel","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Malmaison Oxford","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"The Randolph Hotel by Graduate Hotels","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Old Bank Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Old Parsonage Hotel","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Cambridge",
"image"=>"images/united_kingdom/cambridge_university.jpg",
"rating"=>4.6,
"points"=>[
"Historic university",
"River punting",
"College architecture",
"Peaceful atmosphere"
],
"things_to_do"=>[
"Punting tour",
"King’s College Chapel visit",
"College walking tour",
"Botanic garden visit"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"YHA Cambridge","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"Arundel House Hotel","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Hotel du Vin Cambridge","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Graduate Cambridge","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"University Arms Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Varsity Hotel & Spa","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Bath",
"image"=>"images/united_kingdom/bath_roman_baths.jpg",
"rating"=>4.7,
"points"=>[
"Roman Baths",
"Georgian architecture",
"Historic spa city",
"Relaxing atmosphere"
],
"things_to_do"=>[
"Roman Baths tour",
"Thermal spa experience",
"Royal Crescent walk",
"Bath Abbey visit"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"YHA Bath","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"The Z Hotel Bath","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Apex City of Bath Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Harington’s Hotel","budget"=>"MEDIUM","price"=>24500,"rating"=>4.7],
["name"=>"The Gainsborough Bath Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Royal Crescent Hotel & Spa","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Brighton",
"image"=>"images/united_kingdom/brighton_pier.jpg",
"rating"=>4.4,
"points"=>[
"Seaside resort",
"Brighton Pier",
"Vibrant nightlife",
"Artistic culture"
],
"things_to_do"=>[
"Pier rides",
"Beach day",
"Lanes shopping",
"Royal Pavilion visit"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"YHA Brighton","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"ibis Brighton City Centre","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Hotel du Vin Brighton","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"The Old Ship Hotel","budget"=>"MEDIUM","price"=>24500,"rating"=>4.7],
["name"=>"The Grand Brighton","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Drakes Hotel Brighton","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"York",
"image"=>"images/united_kingdom/york.jpg",
"rating"=>4.5,
"points"=>[
"Medieval city walls",
"York Minster",
"Historic streets",
"Roman & Viking history"
],
"things_to_do"=>[
"York Minster tour",
"City wall walk",
"Shambles street visit",
"Viking museum"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"YHA York","budget"=>"LOW","price"=>10500,"rating"=>4.2],
["name"=>"ibis York Centre","budget"=>"LOW","price"=>13000,"rating"=>4.3],
["name"=>"Hotel Indigo York","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"The Principal York","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"The Grand, York","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Middletons Hotel","budget"=>"HIGH","price"=>46000,"rating"=>5.0]
]
],

[
"name"=>"Lake District",
"image"=>"images/united_kingdom/lake_district.jpg",
"rating"=>4.8,
"points"=>[
"Natural beauty",
"Lakes & mountains",
"Hiking & nature",
"Peaceful scenery"
],
"things_to_do"=>[
"Lake Windermere cruise",
"Mountain hiking",
"Scenic drives",
"Photography trails"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"YHA Windermere","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"The Royal Oak Inn","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Low Wood Bay Resort & Spa","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Lakes Hotel & Spa","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Gilpin Hotel & Lake House","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"L’Enclume Rooms","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
]

],

"japan" => [

[
"name"=>"Tokyo",
"image"=>"images/japan/tokyo_city.jpg",
"rating"=>4.9,
"points"=>[
"Modern city life",
"Anime & technology hub",
"Famous street food",
"World-class shopping"
],
"things_to_do"=>[
"Shibuya Crossing experience",
"Senso-ji Temple visit",
"Akihabara anime district",
"Tokyo Skytree view"
],
"best_time"=>"March to May & October to November",
"hotels"=>[
["name"=>"Hotel Mystays Ueno East","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"APA Hotel Shinjuku Kabukicho Tower","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Hotel Gracery Shinjuku","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Shinjuku Granbell Hotel","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Park Hyatt Tokyo","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Aman Tokyo","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Kyoto",
"image"=>"images/japan/kyoto_temple.jpg",
"rating"=>4.8,
"points"=>[
"Ancient temples",
"Traditional culture",
"Geisha districts",
"Cherry blossom views"
],
"things_to_do"=>[
"Fushimi Inari Shrine walk",
"Arashiyama bamboo forest",
"Gion district exploration",
"Kiyomizu-dera visit"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Hotel Mystays Kyoto Shijo","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"Sakura Terrace The Gallery","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Hotel Granvia Kyoto","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Kyoto Century Hotel","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Hyatt Regency Kyoto","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Ritz-Carlton Kyoto","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Osaka",
"image"=>"images/japan/osaka_castle.jpg",
"rating"=>4.7,
"points"=>[
"Osaka Castle",
"Street food capital",
"Shopping districts",
"Friendly local culture"
],
"things_to_do"=>[
"Dotonbori food tour",
"Osaka Castle visit",
"Universal Studios Japan",
"Kuromon Market exploration"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Hotel Taiyo Osaka","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"APA Hotel Namba-Eki Higashi","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Hotel Monterey Grasmere Osaka","budget"=>"MEDIUM","price"=>17500,"rating"=>4.6],
["name"=>"Swissotel Nankai Osaka","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"InterContinental Osaka","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Ritz-Carlton Osaka","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Mount Fuji",
"image"=>"images/japan/mount_fuji.jpg",
"rating"=>4.9,
"points"=>[
"Iconic volcano",
"Scenic mountain views",
"Photography paradise",
"Spiritual significance"
],
"things_to_do"=>[
"Fuji hiking (seasonal)",
"Lake Kawaguchi cruise",
"Onsen experience",
"Sunrise photography"
],
"best_time"=>"July to September (climbing season)",
"hotels"=>[
["name"=>"Kawaguchiko Station Inn","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Mount Fuji Hostel Michael’s","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Mystays Fuji Onsen Resort","budget"=>"MEDIUM","price"=>17500,"rating"=>4.6],
["name"=>"Fuji View Hotel","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Hoshinoya Fuji","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Konansou Ryokan","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Nara",
"image"=>"images/japan/nara_deer_park.jpg",
"rating"=>4.6,
"points"=>[
"Friendly deer park",
"Ancient temples",
"Peaceful environment",
"Historic heritage"
],
"things_to_do"=>[
"Nara Park visit",
"Todaiji Temple tour",
"Deer feeding",
"Kasuga Taisha shrine walk"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Guesthouse Nara Backpackers","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel Pagoda","budget"=>"LOW","price"=>10000,"rating"=>4.3],
["name"=>"Hotel Nikko Nara","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Nara Royal Hotel","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Tsukihitei Ryokan","budget"=>"HIGH","price"=>40000,"rating"=>4.9],
["name"=>"ANDO Hotel Nara Wakakusayama","budget"=>"HIGH","price"=>46000,"rating"=>5.0]
]
],

[
"name"=>"Hiroshima",
"image"=>"images/japan/hiroshima_peace_park.jpg",
"rating"=>4.6,
"points"=>[
"Peace Memorial Park",
"Atomic Bomb Dome",
"Historic importance",
"Cultural learning"
],
"things_to_do"=>[
"Peace Museum visit",
"Miyajima Island trip",
"Itsukushima Shrine",
"Local okonomiyaki tasting"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Hiroshima Hana Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.3],
["name"=>"APA Hotel Hiroshima-Ekimae Ohashi","budget"=>"LOW","price"=>10500,"rating"=>4.4],
["name"=>"Hotel Granvia Hiroshima","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Rihga Royal Hotel Hiroshima","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Sheraton Grand Hiroshima Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Setouchi Aonagi (near Hiroshima)","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Sapporo",
"image"=>"images/japan/sapporo_snow_festival.jpg",
"rating"=>4.5,
"points"=>[
"Snow festival",
"Winter sports",
"Beer museum",
"Cool climate city"
],
"things_to_do"=>[
"Sapporo Snow Festival",
"Skiing trips",
"Beer Museum tour",
"Odori Park walk"
],
"best_time"=>"December to February (snow) & July to August",
"hotels"=>[
["name"=>"Untapped Hostel","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Mystays Sapporo Station","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"JR-East Hotel Mets Sapporo","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Cross Hotel Sapporo","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"JR Tower Hotel Nikko Sapporo","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Keio Plaza Hotel Sapporo","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Hakone",
"image"=>"images/japan/hakone_lake_ashi.jpg",
"rating"=>4.7,
"points"=>[
"Hot springs",
"Lake Ashi views",
"Mount Fuji sight",
"Relaxing nature"
],
"things_to_do"=>[
"Onsen bathing",
"Lake Ashi cruise",
"Hakone ropeway",
"Open Air Museum visit"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"K's House Hakone","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Emblem Flow Hakone","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Hakone Kowakien Hotel","budget"=>"MEDIUM","price"=>17500,"rating"=>4.6],
["name"=>"Hyatt Regency Hakone Resort & Spa","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Gora Kadan","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Hakone Ginyu","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Kobe",
"image"=>"images/japan/kobe_harbor.jpg",
"rating"=>4.5,
"points"=>[
"Kobe beef",
"Harbor views",
"Modern city",
"Mountain backdrop"
],
"things_to_do"=>[
"Kobe beef tasting",
"Harborland walk",
"Mount Rokko view",
"Arima Onsen visit"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Kobe Guesthouse Maya","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel Sunroute Sopra Kobe","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Hotel Okura Kobe","budget"=>"MEDIUM","price"=>17500,"rating"=>4.6],
["name"=>"ANA Crowne Plaza Kobe","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Oriental Hotel Kobe","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Arimasansoh Goshobessho","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Yokohama",
"image"=>"images/japan/yokohama_city.jpg",
"rating"=>4.4,
"points"=>[
"Modern port city",
"Chinatown",
"Waterfront parks",
"Urban lifestyle"
],
"things_to_do"=>[
"Minato Mirai walk",
"Yokohama Chinatown food tour",
"Cosmo World ride",
"Harbor night view"
],
"best_time"=>"March to May & October",
"hotels"=>[
["name"=>"Sakura Hotel Yokohama","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"Hotel Edit Yokohama","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Hotel New Grand","budget"=>"MEDIUM","price"=>17500,"rating"=>4.6],
["name"=>"InterContinental Yokohama Grand","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"The Yokohama Bay Hotel Tokyu","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Westin Yokohama","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
]

],

"south_korea" => [

[
"name"=>"Seoul",
"image"=>"images/south_korea/seoul_city.jpg",
"rating"=>4.9,
"points"=>[
"Modern city with rich history",
"K-pop & K-drama culture",
"Shopping districts",
"Palaces and temples"
],
"things_to_do"=>[
"Gyeongbokgung Palace visit",
"Myeongdong street shopping",
"N Seoul Tower view",
"Han River night walk"
],
"best_time"=>"April to June & September to October",
"hotels"=>[
["name"=>"Step Inn Myeongdong","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Hotel PJ Myeongdong","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Nine Tree Premier Hotel Myeongdong","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Lotte Hotel Seoul","budget"=>"MEDIUM","price"=>22000,"rating"=>4.7],
["name"=>"Signiel Seoul","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Seoul","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Busan",
"image"=>"images/south_korea/busan_beach.jpg",
"rating"=>4.7,
"points"=>[
"Beautiful beaches",
"Seafood markets",
"Coastal city vibe",
"Colorful villages"
],
"things_to_do"=>[
"Haeundae Beach relaxation",
"Gamcheon Culture Village",
"Jagalchi Fish Market",
"Taejongdae cliff views"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Kimchee Busan Downtown Guesthouse","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Toyoko Inn Busan Seomyeon","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Shilla Stay Haeundae","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Paradise Hotel Busan","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Park Hyatt Busan","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Signiel Busan","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Jeju Island",
"image"=>"images/south_korea/jeju_island.jpg",
"rating"=>4.8,
"points"=>[
"Volcanic landscapes",
"Beautiful beaches",
"Romantic destination",
"Natural waterfalls"
],
"things_to_do"=>[
"Hallasan Mountain hike",
"Seongsan Ilchulbong sunrise",
"Jeongbang Waterfall",
"Jeju coastal drive"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Jeju Hiking Inn","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel RegentMarine The Blue","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Shalom Jeju","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Lotte City Hotel Jeju","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Shilla Jeju","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Grand Hyatt Jeju","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Incheon",
"image"=>"images/south_korea/incheon_chinatown.jpg",
"rating"=>4.5,
"points"=>[
"Modern port city",
"International airport hub",
"Chinatown",
"Urban development"
],
"things_to_do"=>[
"Incheon Chinatown walk",
"Songdo Central Park",
"Wolmido Island visit",
"Incheon Bridge night view"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Incheon Airport Guesthouse","budget"=>"LOW","price"=>9000,"rating"=>4.1],
["name"=>"Toyoko Inn Incheon Bupyeong","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Orakai Songdo Park Hotel","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Sheraton Grand Incheon Hotel","budget"=>"MEDIUM","price"=>21000,"rating"=>4.7],
["name"=>"Grand Hyatt Incheon","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Paradise City Hotel & Resort","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Gyeongju",
"image"=>"images/south_korea/gyeongju_temple.jpg",
"rating"=>4.6,
"points"=>[
"Historic capital",
"Ancient temples",
"UNESCO heritage sites",
"Cultural experience"
],
"things_to_do"=>[
"Bulguksa Temple visit",
"Seokguram Grotto",
"Daereungwon Tomb Complex",
"Anapji Pond night view"
],
"best_time"=>"April to June & October",
"hotels"=>[
["name"=>"Gyeongju Guesthouse Friend","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Blueboat Hostel Gyeongju","budget"=>"LOW","price"=>10000,"rating"=>4.3],
["name"=>"Gyeongju GG Tourist Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Hilton Gyeongju","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Lahan Select Gyeongju","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Kolon Hotel Gyeongju","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Daegu",
"image"=>"images/south_korea/daegu.jpg",
"rating"=>4.4,
"points"=>[
"Fashion & textile city",
"Surrounded by mountains",
"Local markets",
"Cultural festivals"
],
"things_to_do"=>[
"Apsan Park cable car",
"Seomun Market shopping",
"E-World theme park",
"Daegu Yangnyeongsi Museum"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Empathy Guesthouse Daegu","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Toyoko Inn Daegu Dongseong-ro","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Eldis Regent Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Hotel Inter-Burgo Daegu","budget"=>"MEDIUM","price"=>20000,"rating"=>4.7],
["name"=>"Daegu Marriott Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Hotel Inter-Burgo Exco","budget"=>"HIGH","price"=>46000,"rating"=>5.0]
]
],

[
"name"=>"Suwon",
"image"=>"images/south_korea/suwon.jpg",
"rating"=>4.5,
"points"=>[
"Hwaseong Fortress",
"Historic walls",
"Cultural city",
"Near Seoul"
],
"things_to_do"=>[
"Hwaseong Fortress walk",
"Suwon Chicken Street",
"Haenggung Palace visit",
"Gwanggyo Lake Park"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Suwon Guesthouse","budget"=>"LOW","price"=>8500,"rating"=>4.1],
["name"=>"Ibis Ambassador Suwon","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Ramada Plaza by Wyndham Suwon","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Novotel Ambassador Suwon","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Courtyard by Marriott Suwon","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Haeden Hotel High End Suwon","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Daejeon",
"image"=>"images/south_korea/daejeon.jpg",
"rating"=>4.3,
"points"=>[
"Science & technology hub",
"Hot springs",
"Green parks",
"Peaceful city"
],
"things_to_do"=>[
"Yuseong Hot Springs",
"Daejeon Expo Park",
"Hanbat Arboretum",
"O-World theme park"
],
"best_time"=>"April to June & September",
"hotels"=>[
["name"=>"Daejeon Guesthouse Sky Garden","budget"=>"LOW","price"=>8500,"rating"=>4.1],
["name"=>"Toyoko Inn Daejeon Government Complex","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hotel Interciti Daejeon","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Ramada by Wyndham Daejeon","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"LOTTE City Hotel Daejeon","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Hotel Onoma Daejeon, Autograph Collection","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Pohang",
"image"=>"images/south_korea/pohang.jpg",
"rating"=>4.2,
"points"=>[
"Coastal city",
"Sea views",
"Steel industry heritage",
"Quiet beaches"
],
"things_to_do"=>[
"Homigot Sunrise Square",
"Youngildae Beach",
"Space Walk Pohang",
"Jukdo Market visit"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Pohang Youngildae Guesthouse","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel View Pohang","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Best Western Pohang Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Lahan Hotel Pohang","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Hotel Benikea Pohang","budget"=>"HIGH","price"=>32000,"rating"=>4.8],
["name"=>"Pohang Hotel Noblestay","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Gangneung",
"image"=>"images/south_korea/gangneung.jpg",
"rating"=>4.6,
"points"=>[
"East Sea beaches",
"Winter Olympics city",
"Coffee street",
"Scenic coastline"
],
"things_to_do"=>[
"Gyeongpo Beach walk",
"Anmok Coffee Street",
"Ojukheon House",
"Sunrise at Jeongdongjin"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Gangneung Guesthouse Myhome","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel Cube Gangneung","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"St. John's Hotel Gangneung","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Skybay Hotel Gyeongpo","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Seamarq Hotel","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Pine Art Label Gangneung","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
]

],

"thailand" => [

[
"name"=>"Bangkok",
"image"=>"images/thailand/bangkok.jpg",
"rating"=>4.8,
"points"=>[
"Grand Palace & temples",
"Street food paradise",
"Floating markets",
"Nightlife & shopping"
],
"things_to_do"=>[
"Visit Grand Palace & Wat Arun",
"Chao Phraya River cruise",
"Chatuchak Market shopping",
"Rooftop bar experience"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"Lub d Bangkok Siam","budget"=>"LOW","price"=>8500,"rating"=>4.3],
["name"=>"Ibis Bangkok Riverside","budget"=>"LOW","price"=>10500,"rating"=>4.4],
["name"=>"Centre Point Sukhumvit 10","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Anantara Riverside Bangkok Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Siam Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Mandarin Oriental Bangkok","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Phuket",
"image"=>"images/thailand/phuket.jpg",
"rating"=>4.9,
"points"=>[
"Beautiful beaches",
"Island hopping",
"Luxury resorts",
"Water activities"
],
"things_to_do"=>[
"Phi Phi Island tour",
"Patong Beach sunset",
"Big Buddha Phuket visit",
"Snorkeling & scuba diving"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Lub d Bangkok Siam","budget"=>"LOW","price"=>8500,"rating"=>4.3],
["name"=>"Ibis Bangkok Riverside","budget"=>"LOW","price"=>10500,"rating"=>4.4],
["name"=>"Centre Point Sukhumvit 10","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Anantara Riverside Bangkok Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Siam Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Mandarin Oriental Bangkok","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Chiang Mai",
"image"=>"images/thailand/chiang_mai.jpg",
"rating"=>4.7,
"points"=>[
"Mountain views",
"Ancient temples",
"Cultural city",
"Night markets"
],
"things_to_do"=>[
"Doi Suthep Temple visit",
"Elephant sanctuary experience",
"Sunday Walking Street",
"Night Bazaar shopping"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"Green Tiger House","budget"=>"LOW","price"=>8000,"rating"=>4.3],
["name"=>"Ibis Styles Chiang Mai","budget"=>"LOW","price"=>10000,"rating"=>4.4],
["name"=>"U Nimman Chiang Mai","budget"=>"MEDIUM","price"=>15000,"rating"=>4.6],
["name"=>"Shangri-La Chiang Mai","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"137 Pillars House Chiang Mai","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Four Seasons Resort Chiang Mai","budget"=>"HIGH","price"=>45000,"rating"=>5.0]
]
],

[
"name"=>"Pattaya",
"image"=>"images/thailand/pattaya.jpg",
"rating"=>4.5,
"points"=>[
"Beach city",
"Water sports",
"Vibrant nightlife",
"Family attractions"
],
"things_to_do"=>[
"Coral Island trip",
"Walking Street nightlife",
"Sanctuary of Truth visit",
"Water sports activities"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"April Suites Pattaya","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Pattaya","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Holiday Inn Pattaya","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Centara Grand Mirage Beach Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Royal Cliff Beach Hotel","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Cape Dara Resort Pattaya","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Krabi",
"image"=>"images/thailand/krabi.jpg",
"rating"=>4.8,
"points"=>[
"Limestone cliffs",
"Clear water beaches",
"Island tours",
"Peaceful nature"
],
"things_to_do"=>[
"Railay Beach visit",
"Four Island tour",
"Kayaking in Ao Thalane",
"Emerald Pool swim"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Krabi Pitta House","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Styles Krabi Ao Nang","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Aonang Villa Resort","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Dusit Thani Krabi Beach Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Rayavadee Krabi","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Phulay Bay, A Ritz-Carlton Reserve","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Ayutthaya",
"image"=>"images/thailand/ayutthaya.jpg",
"rating"=>4.6,
"points"=>[
"Ancient capital",
"Historic ruins",
"UNESCO heritage",
"Cultural learning"
],
"things_to_do"=>[
"Ayutthaya Historical Park",
"Wat Mahathat visit",
"Temple cycling tour",
"River cruise experience"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"Zleepinezz Hostel","budget"=>"LOW","price"=>8000,"rating"=>4.2],
["name"=>"Ayutthaya Retreat","budget"=>"LOW","price"=>10000,"rating"=>4.3],
["name"=>"Sala Ayutthaya","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Classic Kameo Hotel Ayutthaya","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Centara Ayutthaya","budget"=>"HIGH","price"=>32000,"rating"=>4.9],
["name"=>"Kantary Hotel Ayutthaya","budget"=>"HIGH","price"=>36000,"rating"=>5.0]
]
],

[
"name"=>"Hua Hin",
"image"=>"images/thailand/hua_hin.jpg",
"rating"=>4.6,
"points"=>[
"Royal beach resort",
"Relaxing atmosphere",
"Golf resorts",
"Night markets"
],
"things_to_do"=>[
"Hua Hin Beach walk",
"Cicada Night Market",
"Khao Sam Roi Yot National Park",
"Golf & spa retreat"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"Baan Nilrath Hotel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Hua Hin","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hua Hin Marriott Resort & Spa","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Hilton Hua Hin Resort & Spa","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Barai at Hyatt Regency Hua Hin","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Chiva-Som International Health Resort","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Pai",
"image"=>"images/thailand/pai.jpg",
"rating"=>4.5,
"points"=>[
"Mountain village",
"Peaceful nature",
"Hot springs",
"Scenic sunsets"
],
"things_to_do"=>[
"Pai Canyon sunset",
"Tha Pai Hot Springs",
"Bamboo Bridge walk",
"Waterfall exploration"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"Pai Circus Hostel","budget"=>"LOW","price"=>7500,"rating"=>4.3],
["name"=>"Baan Pai Village","budget"=>"LOW","price"=>9500,"rating"=>4.4],
["name"=>"Pai Village Boutique Resort","budget"=>"MEDIUM","price"=>15000,"rating"=>4.6],
["name"=>"Reverie Siam Resort","budget"=>"MEDIUM","price"=>17500,"rating"=>4.7],
["name"=>"Yoma Hotel Pai","budget"=>"HIGH","price"=>30000,"rating"=>4.9],
["name"=>"Montis Resort Pai","budget"=>"HIGH","price"=>34000,"rating"=>5.0]
]
],

[
"name"=>"Koh Samui",
"image"=>"images/thailand/samui.jpg",
"rating"=>4.9,
"points"=>[
"Luxury island",
"White sand beaches",
"Honeymoon destination",
"Spa & wellness"
],
"things_to_do"=>[
"Ang Thong Marine Park tour",
"Chaweng Beach relaxation",
"Big Buddha Temple visit",
"Luxury spa retreat"
],
"best_time"=>"December to April",
"hotels"=>[
["name"=>"Samui Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Samui Bophut","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"The Briza Beach Resort Samui","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Anantara Lawana Koh Samui Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Six Senses Samui","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Conrad Koh Samui","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Kanchanaburi",
"image"=>"images/thailand/kanchanaburi.jpg",
"rating"=>4.5,
"points"=>[
"Bridge on River Kwai",
"Historical importance",
"Natural parks",
"River scenery"
],
"things_to_do"=>[
"Bridge on River Kwai visit",
"Erawan Waterfalls trip",
"Hellfire Pass Memorial",
"River rafting experience"
],
"best_time"=>"November to February",
"hotels"=>[
["name"=>"No.9 Guesthouse","budget"=>"LOW","price"=>7500,"rating"=>4.2],
["name"=>"Good Times Resort Kanchanaburi","budget"=>"LOW","price"=>9500,"rating"=>4.4],
["name"=>"Felix River Kwai Resort","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"U Inchantree Kanchanaburi","budget"=>"MEDIUM","price"=>18000,"rating"=>4.7],
["name"=>"The FloatHouse River Kwai","budget"=>"HIGH","price"=>36000,"rating"=>4.9],
["name"=>"Hintok River Camp at Hellfire Pass","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
]

],

"singapore" => [

[
"name"=>"Marina Bay Sands",
"image"=>"images/singapore/marina_bay_sands.jpg",
"rating"=>4.9,
"points"=>[
"Iconic infinity pool",
"Luxury shopping mall",
"SkyPark observation deck",
"Night skyline views"
],
"things_to_do"=>[
"Infinity pool experience",
"SkyPark sunset view",
"Luxury mall shopping",
"Spectra light & water show"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel Boss","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Mi Rochor","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"PARKROYAL COLLECTION Marina Bay","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"The Fullerton Hotel Singapore","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Marina Bay Sands","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Raffles Singapore","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Sentosa Island",
"image"=>"images/singapore/sentosa_island.jpg",
"rating"=>4.8,
"points"=>[
"Beach resorts",
"Universal Studios",
"Adventure activities",
"Relaxing island vibes"
],
"things_to_do"=>[
"Universal Studios Singapore",
"Siloso Beach relaxation",
"S.E.A. Aquarium visit",
"Skyline Luge ride"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Siloso Beach Resort Sentosa","budget"=>"LOW","price"=>14000,"rating"=>4.2],
["name"=>"ibis Styles Singapore on MacPherson","budget"=>"LOW","price"=>16000,"rating"=>4.3],
["name"=>"Village Hotel Sentosa","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Oasia Resort Sentosa","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"W Singapore – Sentosa Cove","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Capella Singapore","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Gardens by the Bay",
"image"=>"images/singapore/gardens_by_the_bay.jpg",
"rating"=>4.9,
"points"=>[
"Supertree light show",
"Futuristic gardens",
"Flower Dome & Cloud Forest",
"Eco-tourism attraction"
],
"things_to_do"=>[
"Supertree light show",
"Cloud Forest visit",
"Flower Dome exploration",
"OCBC Skyway walk"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel 81 Premier Star","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"V Hotel Lavender","budget"=>"LOW","price"=>15500,"rating"=>4.3],
["name"=>"PARKROYAL COLLECTION Marina Bay","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"The Fullerton Bay Hotel Singapore","budget"=>"MEDIUM","price"=>30000,"rating"=>4.7],
["name"=>"Marina Bay Sands","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Ritz-Carlton, Millenia Singapore","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Merlion Park",
"image"=>"images/singapore/merlion_park.jpg",
"rating"=>4.6,
"points"=>[
"Symbol of Singapore",
"Waterfront views",
"Photo-friendly spot",
"City skyline backdrop"
],
"things_to_do"=>[
"Merlion photo stop",
"Marina Bay walk",
"Evening skyline photography",
"Boat Quay stroll"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel Boss","budget"=>"LOW","price"=>14000,"rating"=>4.2],
["name"=>"V Hotel Lavender","budget"=>"LOW","price"=>16000,"rating"=>4.3],
["name"=>"PARKROYAL COLLECTION Marina Bay","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"The Fullerton Hotel Singapore","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Marina Bay Sands","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Fullerton Bay Hotel Singapore","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Orchard Road",
"image"=>"images/singapore/orchard_road.jpg",
"rating"=>4.7,
"points"=>[
"Luxury shopping street",
"Branded malls",
"Cafes and nightlife",
"Urban lifestyle"
],
"things_to_do"=>[
"ION Orchard shopping",
"Luxury brand stores",
"Cafe hopping",
"Night city walk"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel Chancellor@Orchard","budget"=>"LOW","price"=>15000,"rating"=>4.2],
["name"=>"YOTEL Singapore Orchard Road","budget"=>"LOW","price"=>17500,"rating"=>4.3],
["name"=>"Orchard Hotel Singapore","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Hilton Singapore Orchard","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Mandarin Orchard Singapore","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Singapore","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Clarke Quay",
"image"=>"images/singapore/clarke_quay.jpg",
"rating"=>4.6,
"points"=>[
"Nightlife hotspot",
"Riverside dining",
"Live music clubs",
"Party atmosphere"
],
"things_to_do"=>[
"River cruise",
"Night club hopping",
"Riverside dining",
"Live music experience"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel NuVe Elements","budget"=>"LOW","price"=>14500,"rating"=>4.2],
["name"=>"ibis Singapore Clarke Quay","budget"=>"LOW","price"=>16500,"rating"=>4.3],
["name"=>"Park Hotel Clarke Quay","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Furama RiverFront","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"The Warehouse Hotel","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"InterContinental Singapore Robertson Quay","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Singapore Zoo",
"image"=>"images/singapore/singapore_zoo.jpg",
"rating"=>4.7,
"points"=>[
"Open-concept zoo",
"Family friendly",
"Wildlife encounters",
"Night safari nearby"
],
"things_to_do"=>[
"Singapore Zoo visit",
"Night Safari tour",
"River Wonders",
"Animal feeding sessions"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Value Hotel Thomson","budget"=>"LOW","price"=>13500,"rating"=>4.2],
["name"=>"ibis Singapore Novena","budget"=>"LOW","price"=>16000,"rating"=>4.3],
["name"=>"Courtyard by Marriott Singapore Novena","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Aloft Singapore Novena","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Shangri-La Singapore","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"The Ritz-Carlton, Millenia Singapore","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Little India",
"image"=>"images/singapore/little_india_singapore.jpg",
"rating"=>4.5,
"points"=>[
"Indian culture",
"Colorful streets",
"Local markets",
"Authentic food"
],
"things_to_do"=>[
"Sri Veeramakaliamman Temple",
"Mustafa Centre shopping",
"Indian street food tasting",
"Colorful mural photography"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Hotel Mi Rochor","budget"=>"LOW","price"=>14000,"rating"=>4.2],
["name"=>"ibis Singapore on Bencoolen","budget"=>"LOW","price"=>16500,"rating"=>4.3],
["name"=>"One Farrer Hotel","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Holiday Inn Singapore Little India","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Wanderlust by The Unlimited Collection","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Vagabond Club Singapore","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Chinatown",
"image"=>"images/singapore/chinatown_singapore.jpg",
"rating"=>4.6,
"points"=>[
"Cultural heritage",
"Street shopping",
"Buddha Tooth Relic Temple",
"Traditional food"
],
"things_to_do"=>[
"Buddha Tooth Relic Temple visit",
"Chinatown street market",
"Hawker centre dining",
"Heritage centre tour"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Beary Best! Hostel Chinatown","budget"=>"LOW","price"=>13500,"rating"=>4.2],
["name"=>"Hotel 81 Chinatown","budget"=>"LOW","price"=>15500,"rating"=>4.3],
["name"=>"Dorsett Singapore","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Amoy Hotel by Far East Hospitality","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"The Clan Hotel Singapore","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Sofitel Singapore City Centre","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Jewel Changi Airport",
"image"=>"images/singapore/jewel_changi.jpg",
"rating"=>4.9,
"points"=>[
"Indoor waterfall",
"Shopping & dining",
"Architectural marvel",
"World-class airport experience"
],
"things_to_do"=>[
"Rain Vortex waterfall visit",
"Canopy Park activities",
"Shopping & dining",
"Photo walk inside Jewel"
],
"best_time"=>"Year-round destination",
"hotels"=>[
["name"=>"ibis budget Singapore Joo Chiat","budget"=>"LOW","price"=>15000,"rating"=>4.2],
["name"=>"YOTELAIR Singapore Changi Airport","budget"=>"LOW","price"=>17500,"rating"=>4.3],
["name"=>"Crowne Plaza Changi Airport","budget"=>"MEDIUM","price"=>28000,"rating"=>4.7],
["name"=>"Dusit Thani Laguna Singapore","budget"=>"MEDIUM","price"=>30000,"rating"=>4.6],
["name"=>"Capri by Fraser Changi City","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Crowne Plaza Changi Airport (Premium Rooms)","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
]

],

"malaysia" => [

[
"name"=>"Kuala Lumpur",
"image"=>"images/malaysia/kuala_lumpur_petronas.jpg",
"rating"=>4.8,
"points"=>[
"Petronas Twin Towers",
"Modern city lifestyle",
"Shopping & nightlife",
"Cultural diversity"
],
"things_to_do"=>[
"Petronas Skybridge visit",
"Batu Caves tour",
"KL Tower observation deck",
"Shopping at Bukit Bintang"
],
"best_time"=>"May to July",
"hotels"=>[
["name"=>"Hotel Sentral Kuala Lumpur","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Ibis Kuala Lumpur City Centre","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Aloft Kuala Lumpur Sentral","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Traders Hotel Kuala Lumpur","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Mandarin Oriental Kuala Lumpur","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The St. Regis Kuala Lumpur","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Langkawi",
"image"=>"images/malaysia/langkawi_beach.jpg",
"rating"=>4.9,
"points"=>[
"Beautiful beaches",
"Cable car & Sky Bridge",
"Island relaxation",
"Sunset views"
],
"things_to_do"=>[
"Langkawi Sky Bridge walk",
"Island hopping tour",
"Pantai Cenang beach time",
"Sunset cruise"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"Langkawi Chantique","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Ibis Styles Langkawi Kuah","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Bayview Hotel Langkawi","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Berjaya Langkawi Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Westin Langkawi Resort & Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Datai Langkawi","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Penang",
"image"=>"images/malaysia/penang_george_town.jpg",
"rating"=>4.7,
"points"=>[
"George Town heritage",
"Street art",
"Famous street food",
"Colonial architecture"
],
"things_to_do"=>[
"George Town heritage walk",
"Street art photography",
"Penang Hill visit",
"Gurney Drive food tour"
],
"best_time"=>"December to February",
"hotels"=>[
["name"=>"Red Inn Heritage Guesthouse","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel Neo+ Penang","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Sunway Hotel Georgetown Penang","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Eastern & Oriental Hotel","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Shangri-La Rasa Sayang, Penang","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Prestige Hotel Penang","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Genting Highlands",
"image"=>"images/malaysia/genting_highlands.jpg",
"rating"=>4.6,
"points"=>[
"Hill station resort",
"Theme parks",
"Cool climate",
"Casino & entertainment"
],
"things_to_do"=>[
"Genting SkyWorlds theme park",
"Cable car ride",
"Casino visit",
"Premium outlet shopping"
],
"best_time"=>"March to September",
"hotels"=>[
["name"=>"Resorts World Genting – First World Hotel","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Resorts World Genting – Awana Hotel","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Resorts World Genting – Genting SkyWorlds Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Resorts World Genting – Crockfords","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Resorts World Genting – Highlands Hotel","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Resorts World Genting – Crockfords Villas","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Cameron Highlands",
"image"=>"images/malaysia/cameron_highlands.jpg",
"rating"=>4.6,
"points"=>[
"Tea plantations",
"Cool weather",
"Nature walks",
"Strawberry farms"
],
"things_to_do"=>[
"BOH Tea Plantation visit",
"Strawberry farm tour",
"Mossy Forest hike",
"Butterfly garden visit"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Father's Guesthouse","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Heritage Hotel Cameron Highlands","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Strawberry Park Resort","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"The Smokehouse Hotel & Restaurant","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Cameron Highlands Resort","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"The Lakehouse Cameron Highlands","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Malacca",
"image"=>"images/malaysia/malacca_heritage.jpg",
"rating"=>4.6,
"points"=>[
"Historical city",
"Dutch architecture",
"Jonker Street",
"River cruise"
],
"things_to_do"=>[
"Jonker Street night market",
"Malacca River cruise",
"A Famosa fort visit",
"Dutch Square walk"
],
"best_time"=>"May to July",
"hotels"=>[
["name"=>"Ringo's Foyer Guest House","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Hotel Puri Melaka","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Hatten Hotel Melaka","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Estadia Hotel Melaka","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Casa del Rio Melaka","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"The Majestic Malacca","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Perhentian Islands",
"image"=>"images/malaysia/perhentian_islands.jpg",
"rating"=>4.8,
"points"=>[
"Crystal clear waters",
"Snorkeling & diving",
"Island escape",
"Marine life"
],
"things_to_do"=>[
"Snorkeling tour",
"Scuba diving",
"Beach relaxation",
"Sunset watching"
],
"best_time"=>"March to October",
"hotels"=>[
["name"=>"Matahari Chalet","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Perhentian Island Resort (Standard Rooms)","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Coral View Island Resort","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Alunan Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"BuBu Resort Perhentian","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Perhentian Marriott Resort & Spa","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Sabah",
"image"=>"images/malaysia/sabah_mount_kinabalu.jpg",
"rating"=>4.7,
"points"=>[
"Mount Kinabalu",
"Wildlife experience",
"Rainforests",
"Adventure tourism"
],
"things_to_do"=>[
"Mount Kinabalu trek",
"Island hopping in Kota Kinabalu",
"Wildlife safari",
"Tunku Abdul Rahman Park visit"
],
"best_time"=>"February to April",
"hotels"=>[
["name"=>"Borneo Backpackers Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Tune Hotel 1Borneo Kota Kinabalu","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Gaya Centre Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Shangri-La Tanjung Aru, Kota Kinabalu","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Magellan Sutera Resort","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Gaya Island Resort","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Sarawak",
"image"=>"images/malaysia/sarawak_cultural_village.jpg",
"rating"=>4.6,
"points"=>[
"Cultural villages",
"Rainforests",
"Caves & rivers",
"Tribal heritage"
],
"things_to_do"=>[
"Sarawak Cultural Village",
"Bako National Park",
"Mulu Caves exploration",
"Kuching waterfront walk"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"The Ranee Boutique Suites","budget"=>"LOW","price"=>9000,"rating"=>4.3],
["name"=>"Tune Hotel Waterfront Kuching","budget"=>"LOW","price"=>10500,"rating"=>4.2],
["name"=>"Pullman Kuching","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Grand Margherita Hotel Kuching","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Damai Beach Resort","budget"=>"HIGH","price"=>36000,"rating"=>4.9],
["name"=>"Cove 55","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Tioman Island",
"image"=>"images/malaysia/tioman_island.jpg",
"rating"=>4.7,
"points"=>[
"Coral reefs",
"Tropical beaches",
"Snorkeling",
"Peaceful getaway"
],
"things_to_do"=>[
"Snorkeling trip",
"Scuba diving",
"Beach relaxation",
"Jungle trekking"
],
"best_time"=>"March to October",
"hotels"=>[
["name"=>"Tioman Dive Resort","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Aguna Resort","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Berjaya Tioman Resort","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Paya Beach Spa & Dive Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Japamala Resort by Samadhi","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Tunamaya Beach & Spa Resort","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
]

],

"indonesia" => [

[
"name"=>"Bali",
"image"=>"images/indonesia/bali_beach.jpg",
"rating"=>4.9,
"points"=>[
"Beautiful beaches",
"Balinese culture",
"Surfing & nightlife",
"Temples & sunsets"
],
"things_to_do"=>[
"Uluwatu Temple sunset",
"Ubud rice terrace tour",
"Surfing at Kuta Beach",
"Nusa Penida island trip"
],
"best_time"=>"April to October",
"hotels"=>[
["name"=>"Puri Garden Hotel & Hostel Ubud","budget"=>"LOW","price"=>8500,"rating"=>4.3],
["name"=>"The ONE Legian","budget"=>"LOW","price"=>10500,"rating"=>4.4],
["name"=>"The Alena Resort Ubud","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Potato Head Suites & Studios","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Four Seasons Resort Bali at Sayan","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The Mulia Bali","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Jakarta",
"image"=>"images/indonesia/jakarta_city.jpg",
"rating"=>4.5,
"points"=>[
"Capital city life",
"Shopping malls",
"Street food",
"Modern skyline"
],
"things_to_do"=>[
"National Monument visit",
"Old Town Kota Tua walk",
"Grand Indonesia shopping",
"Ancol Beach trip"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Wonderloft Hostel Jakarta","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Jakarta Harmoni","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Mercure Jakarta Kota","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Pullman Jakarta Indonesia","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Hotel Indonesia Kempinski Jakarta","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"The St. Regis Jakarta","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Yogyakarta",
"image"=>"images/indonesia/yogyakarta_temples.jpg",
"rating"=>4.7,
"points"=>[
"Borobudur Temple",
"Prambanan Temple",
"Javanese culture",
"Historic city"
],
"things_to_do"=>[
"Borobudur sunrise tour",
"Prambanan temple visit",
"Malioboro Street shopping",
"Sultan Palace exploration"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"Wake Up Homestay","budget"=>"LOW","price"=>8000,"rating"=>4.2],
["name"=>"The Capsule Malioboro","budget"=>"LOW","price"=>10000,"rating"=>4.3],
["name"=>"Hotel Neo Malioboro","budget"=>"MEDIUM","price"=>15500,"rating"=>4.6],
["name"=>"Melia Purosani Yogyakarta","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"The Phoenix Hotel Yogyakarta","budget"=>"HIGH","price"=>36000,"rating"=>4.9],
["name"=>"Plataran Borobudur Resort & Spa","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Komodo Island",
"image"=>"images/indonesia/komodo_island.jpg",
"rating"=>4.8,
"points"=>[
"Komodo dragons",
"Pink Beach",
"Snorkeling",
"Wildlife adventure"
],
"things_to_do"=>[
"Komodo dragon trekking",
"Pink Beach visit",
"Snorkeling in clear waters",
"Boat island hopping"
],
"best_time"=>"April to December",
"hotels"=>[
["name"=>"Komodo Lodge","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Green Hill Boutique Hotel Labuan Bajo","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Bintang Flores Hotel","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"AYANA Komodo Waecicu Beach","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Plataran Komodo Resort & Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Sudamala Resort Seraya","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Lombok",
"image"=>"images/indonesia/lombok_island.jpg",
"rating"=>4.7,
"points"=>[
"Peaceful beaches",
"Mount Rinjani",
"Island relaxation",
"Clear blue waters"
],
"things_to_do"=>[
"Mount Rinjani trek",
"Gili Islands tour",
"Beach relaxation",
"Snorkeling adventure"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"Pondok Santi Estate","budget"=>"LOW","price"=>9000,"rating"=>4.3],
["name"=>"Gili Amor Boutique Resort","budget"=>"LOW","price"=>11000,"rating"=>4.4],
["name"=>"Katamaran Hotel & Resort Lombok","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Qunci Villas Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"The Oberoi Beach Resort Lombok","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Jeeva Klui Resort","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Gili Islands",
"image"=>"images/indonesia/gili_islands.jpg",
"rating"=>4.8,
"points"=>[
"No vehicles",
"Crystal clear waters",
"Snorkeling & diving",
"Island vibes"
],
"things_to_do"=>[
"Scuba diving",
"Snorkeling with turtles",
"Beach cycling",
"Sunset swing photos"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"Gili Castle","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Vila Ombak Hotel","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Pearl of Trawangan","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Hotel Ombak Sunset","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"Karma Reef Gili","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"The Oberoi Beach Resort Gili","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Bandung",
"image"=>"images/indonesia/bandung_city.jpg",
"rating"=>4.6,
"points"=>[
"Cool climate",
"Tea plantations",
"Shopping outlets",
"Mountain views"
],
"things_to_do"=>[
"Tangkuban Perahu volcano",
"Tea plantation visit",
"Factory outlet shopping",
"Kawah Putih crater tour"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"The Loft Bandung","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Bandung Trans Studio","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Courtyard by Marriott Bandung Dago","budget"=>"MEDIUM","price"=>16500,"rating"=>4.6],
["name"=>"Hilton Bandung","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"InterContinental Bandung Dago Pakar","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Padma Hotel Bandung","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Raja Ampat",
"image"=>"images/indonesia/raja_ampat.jpg",
"rating"=>4.9,
"points"=>[
"World-class diving",
"Coral reefs",
"Marine biodiversity",
"Untouched nature"
],
"things_to_do"=>[
"Scuba diving adventure",
"Island hopping",
"Snorkeling tour",
"Nature photography"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Raja Ampat Dive Lodge","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"Pef Island Eco Resort","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Agusta Eco Resort Raja Ampat","budget"=>"MEDIUM","price"=>17000,"rating"=>4.6],
["name"=>"Raja Ampat Biodiversity Eco Resort","budget"=>"MEDIUM","price"=>19500,"rating"=>4.7],
["name"=>"Misool Eco Resort","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Cove Eco Resort Raja Ampat","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Surabaya",
"image"=>"images/indonesia/surabaya_city.jpg",
"rating"=>4.5,
"points"=>[
"Historic landmarks",
"City culture",
"Local cuisine",
"Gateway to Mount Bromo"
],
"things_to_do"=>[
"House of Sampoerna visit",
"Suramadu Bridge view",
"Local food tour",
"Day trip to Mount Bromo"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Livinn Hostel Surabaya","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Ibis Surabaya City Center","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Swiss-Belinn Tunjungan Surabaya","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Four Points by Sheraton Surabaya","budget"=>"MEDIUM","price"=>19000,"rating"=>4.7],
["name"=>"JW Marriott Hotel Surabaya","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Hotel Majapahit Surabaya – MGallery","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Mount Bromo",
"image"=>"images/indonesia/mount_bromo.jpg",
"rating"=>4.8,
"points"=>[
"Sunrise views",
"Active volcano",
"Adventure trekking",
"Scenic landscapes"
],
"things_to_do"=>[
"Sunrise jeep tour",
"Crater hiking",
"Photography tour",
"Volcano trekking"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"Café Lava Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Bromo Otix Guest House","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Lava View Lodge","budget"=>"MEDIUM","price"=>16000,"rating"=>4.6],
["name"=>"Bromo Terrace Hotel","budget"=>"MEDIUM","price"=>18500,"rating"=>4.7],
["name"=>"Plataran Bromo","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Jiwana Jawa Resort Bromo","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
]

],

"maldives" => [

[
"name"=>"Male City",
"image"=>"images/maldives/male_city.jpg",
"rating"=>4.6,
"points"=>[
"Capital of Maldives",
"Local island life",
"Markets & mosques",
"Cultural experience"
],
"things_to_do"=>[
"Visit Grand Friday Mosque",
"Explore Male Fish Market",
"Walk along Artificial Beach",
"Local island food tour"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Tourist Inn Maldives","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"UI Inn Maldives","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"Samann Grand","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Hotel Jen Malé (by Shangri-La)","budget"=>"MEDIUM","price"=>21000,"rating"=>4.7],
["name"=>"Barceló Nasandhura Malé","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Somerset Inn Maldives","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Maafushi Island",
"image"=>"images/maldives/maafushi_island.jpg",
"rating"=>4.7,
"points"=>[
"Budget friendly island",
"Water sports",
"Beautiful beaches",
"Local guesthouses"
],
"things_to_do"=>[
"Jet skiing & parasailing",
"Snorkeling trips",
"Sandbank excursion",
"Dolphin watching cruise"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Arena Beach Hotel","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Kaani Village & Spa","budget"=>"LOW","price"=>12000,"rating"=>4.4],
["name"=>"Kaani Palm Beach","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Triton Prestige Seaview & Spa","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Sun Siyam Olhuveli (near Maafushi)","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Anantara Veli Maldives Resort (near Maafushi)","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Hulhumale",
"image"=>"images/maldives/hulhumale_beach.jpg",
"rating"=>4.5,
"points"=>[
"Near airport",
"Urban beach island",
"Easy transport",
"Modern cafes"
],
"things_to_do"=>[
"Beach cycling",
"Water sports activities",
"Cafe hopping",
"Sunset beach walk"
],
"best_time"=>"December to April",
"hotels"=>[
["name"=>"Hulhumale Inn","budget"=>"LOW","price"=>9500,"rating"=>4.2],
["name"=>"Planktons Beach Hotel","budget"=>"LOW","price"=>11500,"rating"=>4.3],
["name"=>"H78 Maldives","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Samann Host Hulhumale","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Hotel Ocean Grand at Hulhumale","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"OBLU XPERIENCE Ailafushi (near Hulhumale)","budget"=>"HIGH","price"=>42000,"rating"=>5.0]
]
],

[
"name"=>"Baa Atoll",
"image"=>"images/maldives/baa_atoll.jpg",
"rating"=>4.9,
"points"=>[
"UNESCO Biosphere",
"Manta ray snorkeling",
"Luxury resorts",
"Crystal lagoons"
],
"things_to_do"=>[
"Manta ray snorkeling",
"Scuba diving",
"Luxury spa retreat",
"Private lagoon cruise"
],
"best_time"=>"December to April",
"hotels"=>[
["name"=>"Kihaa Holiday Retreat","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Royal Island Resort & Spa","budget"=>"LOW","price"=>15000,"rating"=>4.3],
["name"=>"Vakkaru Maldives","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Amilla Maldives Resort & Residences","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Anantara Kihavah Maldives Villas","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Soneva Fushi","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Ari Atoll",
"image"=>"images/maldives/ari_atoll.jpg",
"rating"=>4.8,
"points"=>[
"Whale shark diving",
"Scuba diving",
"Luxury water villas",
"Clear blue waters"
],
"things_to_do"=>[
"Whale shark excursion",
"Night diving",
"Water villa stay",
"Sunset cruise"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Whaleshark Beach Guesthouse","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Thundi Sea View","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"LUX* South Ari Atoll","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Centara Grand Island Resort & Spa","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Conrad Maldives Rangali Island","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"W Maldives","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Vaadhoo Island",
"image"=>"images/maldives/vaadhoo_island.jpg",
"rating"=>4.7,
"points"=>[
"Sea of stars",
"Bioluminescent beach",
"Night photography",
"Unique natural wonder"
],
"things_to_do"=>[
"Night beach photography",
"Bioluminescence walk",
"Stargazing",
"Island boat ride"
],
"best_time"=>"June to October (best glow season)",
"hotels"=>[
["name"=>"Vaadhoo Guesthouse","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"Arena Beach Hotel (near Vaadhoo)","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Adaaran Prestige Vadoo","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Rihiveli Maldives Resort","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Taj Exotica Resort & Spa","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Anantara Dhigu Maldives Resort","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Alimatha Island",
"image"=>"images/maldives/alimatha_island.jpg",
"rating"=>4.6,
"points"=>[
"Diving & snorkeling",
"Shark encounters",
"Beach relaxation",
"All-inclusive resorts"
],
"things_to_do"=>[
"Shark snorkeling",
"Beach relaxation",
"Water sports",
"Sunset cocktails"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Alimatha Aquatic Resort","budget"=>"LOW","price"=>14000,"rating"=>4.3],
["name"=>"Plumeria Maldives (near Alimatha)","budget"=>"LOW","price"=>16500,"rating"=>4.4],
["name"=>"Cinnamon Velifushi Maldives","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"NOOE Maldives Kunaavashi","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Alimatha Island Resort (Premium Villas)","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Sun Siyam Iru Fushi (near Alimatha)","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Thulusdhoo Island",
"image"=>"images/maldives/thulusdhoo_island.jpg",
"rating"=>4.6,
"points"=>[
"Surfing destination",
"Local island vibe",
"Colorful streets",
"Affordable stay"
],
"things_to_do"=>[
"Surfing at Coke's break",
"Island exploration",
"Snorkeling",
"Local café hopping"
],
"best_time"=>"March to October (surf season)",
"hotels"=>[
["name"=>"Thulusdhoo Retreat","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Season Paradise","budget"=>"LOW","price"=>13000,"rating"=>4.4],
["name"=>"Samura Maldives Guesthouse","budget"=>"MEDIUM","price"=>18000,"rating"=>4.6],
["name"=>"Canopus Retreat Thulusdhoo","budget"=>"MEDIUM","price"=>20500,"rating"=>4.7],
["name"=>"Adaaran Select Hudhuranfushi (near Thulusdhoo)","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Anantara Dhigu Maldives Resort (near Thulusdhoo)","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Fihalhohi Island",
"image"=>"images/maldives/fihalhohi_island.jpg",
"rating"=>4.7,
"points"=>[
"Palm tree island",
"House reef snorkeling",
"Romantic getaway",
"Clear waters"
],
"things_to_do"=>[
"House reef snorkeling",
"Couple beach dinner",
"Sunset cruise",
"Relaxing spa session"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Fihalhohi Island Resort (Garden Rooms)","budget"=>"LOW","price"=>18000,"rating"=>4.3],
["name"=>"Planktons Beach Hotel (near Fihalhohi)","budget"=>"LOW","price"=>21000,"rating"=>4.4],
["name"=>"Fihalhohi Island Resort (Superior Rooms)","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Cinnamon Dhonveli Maldives (near Fihalhohi)","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Fihalhohi Island Resort (Water Villas)","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Anantara Veli Maldives Resort (near Fihalhohi)","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Meeru Island",
"image"=>"images/maldives/meeru_island.jpg",
"rating"=>4.8,
"points"=>[
"Popular honeymoon spot",
"Water villas",
"Lagoon beaches",
"Sunset cruises"
],
"things_to_do"=>[
"Honeymoon water villa stay",
"Snorkeling tour",
"Sunset dolphin cruise",
"Beach candlelight dinner"
],
"best_time"=>"December to April",
"hotels"=>[
["name"=>"Meeru Island Resort (Garden Rooms)","budget"=>"LOW","price"=>18000,"rating"=>4.3],
["name"=>"Meeru Island Resort (Beach Villas)","budget"=>"LOW","price"=>21000,"rating"=>4.4],
["name"=>"Meeru Island Resort (Jacuzzi Beach Villas)","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Meeru Island Resort (Water Front Villas)","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Meeru Island Resort (Jacuzzi Water Villas)","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Meeru Island Resort (Presidential Suite)","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
]

],

"switzerland" => [

[
"name"=>"Zurich",
"image"=>"images/switzerland/zurich_city.jpg",
"rating"=>4.7,
"points"=>[
"Financial capital",
"Old town charm",
"Luxury shopping",
"Lake Zurich views"
],
"things_to_do"=>[
"Explore Bahnhofstrasse",
"Boat ride on Lake Zurich",
"Visit Swiss National Museum",
"Walk through Old Town (Altstadt)"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"Hotel ibis Zurich City West","budget"=>"LOW","price"=>12000,"rating"=>4.1],
["name"=>"easyHotel Zurich City Centre","budget"=>"LOW","price"=>14000,"rating"=>4.0],
["name"=>"Hotel Glockenhof Zurich","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Hotel St. Gotthard Zurich","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Baur au Lac Zurich","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Dolder Grand Zurich","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Geneva",
"image"=>"images/switzerland/geneva_lake.jpg",
"rating"=>4.7,
"points"=>[
"Lake Geneva",
"International city",
"UN headquarters",
"Mountain backdrop"
],
"things_to_do"=>[
"See Jet d'Eau fountain",
"Visit United Nations Office",
"Lake Geneva cruise",
"Explore Old Town Geneva"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Geneve Centre Nations","budget"=>"LOW","price"=>13000,"rating"=>4.1],
["name"=>"Hotel des Alpes Geneva","budget"=>"LOW","price"=>15000,"rating"=>4.2],
["name"=>"Hotel Bristol Geneva","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Hotel Cornavin Geneva","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"InterContinental Geneva","budget"=>"HIGH","price"=>48000,"rating"=>4.8],
["name"=>"Hotel President Wilson Geneva","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Interlaken",
"image"=>"images/switzerland/interlaken_mountains.jpg",
"rating"=>4.9,
"points"=>[
"Adventure sports hub",
"Between two lakes",
"Mountain scenery",
"Paragliding & hiking"
],
"things_to_do"=>[
"Paragliding over Interlaken",
"Boat ride on Lake Thun",
"Jungfraujoch day trip",
"Mountain hiking trails"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"Hotel Rugenpark Interlaken","budget"=>"LOW","price"=>12500,"rating"=>4.1],
["name"=>"Hotel Toscana Interlaken","budget"=>"LOW","price"=>14500,"rating"=>4.0],
["name"=>"Hotel Interlaken","budget"=>"MEDIUM","price"=>23000,"rating"=>4.4],
["name"=>"Hotel Metropole Interlaken","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Victoria Jungfrau Grand Hotel & Spa","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Grand Hotel Beau Rivage Interlaken","budget"=>"HIGH","price"=>61000,"rating"=>5.0]
]
],

[
"name"=>"Lucerne",
"image"=>"images/switzerland/lucerne_lake.jpg",
"rating"=>4.8,
"points"=>[
"Chapel Bridge",
"Lake Lucerne",
"Old town streets",
"Mountain excursions"
],
"things_to_do"=>[
"Walk across Chapel Bridge",
"Lake Lucerne cruise",
"Mount Pilatus excursion",
"Explore Lion Monument"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Budget Luzern City","budget"=>"LOW","price"=>12000,"rating"=>4.0],
["name"=>"Hotel Alpha Lucerne","budget"=>"LOW","price"=>14000,"rating"=>4.1],
["name"=>"Hotel Des Alpes Lucerne","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Cascada Boutique Hotel Lucerne","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Hotel Schweizerhof Luzern","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Mandarin Oriental Palace Lucerne","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Zermatt",
"image"=>"images/switzerland/zermatt_matterhorn.jpg",
"rating"=>4.9,
"points"=>[
"Matterhorn views",
"Ski resort",
"Car-free village",
"Luxury mountain stay"
],
"things_to_do"=>[
"Skiing in winter",
"Gornergrat railway ride",
"Hike Matterhorn trails",
"Snowboarding adventures"
],
"best_time"=>"December to March (ski) / June to September (hiking)",
"hotels"=>[
["name"=>"Hotel Bahnhof Zermatt","budget"=>"LOW","price"=>13000,"rating"=>4.1],
["name"=>"Hotel Alpina Zermatt","budget"=>"LOW","price"=>15000,"rating"=>4.2],
["name"=>"Hotel Butterfly Zermatt","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Schweizerhof Zermatt","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Mont Cervin Palace Zermatt","budget"=>"HIGH","price"=>55000,"rating"=>4.9],
["name"=>"The Omnia Zermatt","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Bern",
"image"=>"images/switzerland/bern_old_town.jpg",
"rating"=>4.6,
"points"=>[
"Capital city",
"Medieval old town",
"UNESCO heritage",
"Clock tower (Zytglogge)"
],
"things_to_do"=>[
"Visit Zytglogge clock tower",
"Explore Bear Park",
"Walk through Old Town",
"Visit Einstein Museum"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Budget Bern Expo","budget"=>"LOW","price"=>12000,"rating"=>4.0],
["name"=>"Hotel Waldhorn Bern","budget"=>"LOW","price"=>14000,"rating"=>4.1],
["name"=>"Hotel Savoy Bern","budget"=>"MEDIUM","price"=>23000,"rating"=>4.4],
["name"=>"Best Western Plus Hotel Bern","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Hotel Bellevue Palace Bern","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Hotel Schweizerhof Bern & Spa","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Montreux",
"image"=>"images/switzerland/montreux_lake.jpg",
"rating"=>4.7,
"points"=>[
"Lake Geneva promenade",
"Montreux Jazz Festival",
"Château de Chillon",
"Romantic atmosphere"
],
"things_to_do"=>[
"Visit Chillon Castle",
"Lake promenade walk",
"Attend Montreux Jazz Festival",
"Boat ride on Lake Geneva"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"ibis Budget Montreux","budget"=>"LOW","price"=>12500,"rating"=>4.0],
["name"=>"Hotel Parc & Lac Montreux","budget"=>"LOW","price"=>14500,"rating"=>4.1],
["name"=>"Eurotel Montreux","budget"=>"MEDIUM","price"=>23000,"rating"=>4.4],
["name"=>"Grand Hotel Suisse Majestic Montreux","budget"=>"MEDIUM","price"=>27000,"rating"=>4.5],
["name"=>"Fairmont Le Montreux Palace","budget"=>"HIGH","price"=>54000,"rating"=>4.9],
["name"=>"Royal Plaza Montreux & Spa","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"St. Moritz",
"image"=>"images/switzerland/st_moritz_resort.jpg",
"rating"=>4.8,
"points"=>[
"Luxury ski resort",
"Winter sports",
"Alpine scenery",
"High-end shopping"
],
"things_to_do"=>[
"Skiing & snowboarding",
"Lake St. Moritz walk",
"Luxury spa experience",
"Mountain cable car ride"
],
"best_time"=>"December to March",
"hotels"=>[
["name"=>"Hotel Stille St. Moritz","budget"=>"LOW","price"=>15000,"rating"=>4.1],
["name"=>"Hotel Chesa Rosatsch St. Moritz","budget"=>"LOW","price"=>17000,"rating"=>4.2],
["name"=>"Hotel Reine Victoria St. Moritz","budget"=>"MEDIUM","price"=>26000,"rating"=>4.4],
["name"=>"Hotel Steffani St. Moritz","budget"=>"MEDIUM","price"=>29000,"rating"=>4.5],
["name"=>"Badrutt's Palace Hotel St. Moritz","budget"=>"HIGH","price"=>65000,"rating"=>5.0],
["name"=>"Kulm Hotel St. Moritz","budget"=>"HIGH","price"=>60000,"rating"=>4.9]
]
],

[
"name"=>"Grindelwald",
"image"=>"images/switzerland/grindelwald_valley.jpg",
"rating"=>4.8,
"points"=>[
"Alpine village",
"First Cliff Walk",
"Hiking trails",
"Snow activities"
],
"things_to_do"=>[
"First Cliff Walk",
"Cable car to Jungfrau region",
"Snow sports",
"Mountain hiking"
],
"best_time"=>"June to September / December to March",
"hotels"=>[
["name"=>"Hotel Eiger Grindelwald","budget"=>"LOW","price"=>13500,"rating"=>4.2],
["name"=>"Hotel Alpenblick Grindelwald","budget"=>"LOW","price"=>15500,"rating"=>4.1],
["name"=>"Sunstar Hotel Grindelwald","budget"=>"MEDIUM","price"=>25000,"rating"=>4.5],
["name"=>"Belvedere Swiss Quality Hotel Grindelwald","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Romantik Hotel Schweizerhof Grindelwald","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Bergwelt Grindelwald Alpine Design Resort","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Lugano",
"image"=>"images/switzerland/lugano.jpg",
"rating"=>4.6,
"points"=>[
"Italian-Swiss culture",
"Lake Lugano",
"Palm-lined streets",
"Relaxed lifestyle"
],
"things_to_do"=>[
"Lake Lugano cruise",
"Visit Parco Ciani",
"Explore Monte Brè",
"Walk lakeside promenade"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Budget Lugano Paradiso","budget"=>"LOW","price"=>12500,"rating"=>4.0],
["name"=>"Hotel Stella Lugano","budget"=>"LOW","price"=>14500,"rating"=>4.1],
["name"=>"Hotel De La Paix Lugano","budget"=>"MEDIUM","price"=>24000,"rating"=>4.4],
["name"=>"Hotel Splendide Royal Lugano","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Villa Principe Leopoldo Lugano","budget"=>"HIGH","price"=>55000,"rating"=>4.9],
["name"=>"The View Lugano","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
]

],

"germany" => [

[
"name"=>"Berlin",
"image"=>"images/germany/berlin_brandenburg_gate.jpg",
"rating"=>4.7,
"points"=>[
"Historic landmarks",
"Berlin Wall & museums",
"Vibrant nightlife",
"Cultural diversity"
],
"things_to_do"=>[
"Visit Brandenburg Gate",
"Explore Berlin Wall Memorial",
"Museum Island tour",
"Experience Kreuzberg nightlife"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o Berlin Hauptbahnhof","budget"=>"LOW","price"=>9000,"rating"=>4.0],
["name"=>"ibis Berlin Hauptbahnhof","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Hotel Adlon Kempinski Berlin","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Pullman Berlin Schweizerhof","budget"=>"MEDIUM","price"=>25000,"rating"=>4.5],
["name"=>"The Ritz-Carlton Berlin","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Hotel de Rome Berlin","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Munich",
"image"=>"images/germany/munich_marienplatz.jpg",
"rating"=>4.8,
"points"=>[
"Oktoberfest city",
"Bavarian culture",
"Historic squares",
"Beer gardens"
],
"things_to_do"=>[
"Visit Marienplatz",
"Enjoy Oktoberfest",
"Explore Nymphenburg Palace",
"Relax in English Garden"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o München Hackerbrücke","budget"=>"LOW","price"=>9500,"rating"=>4.0],
["name"=>"ibis Budget München City Olympiapark","budget"=>"LOW","price"=>11500,"rating"=>4.1],
["name"=>"Hotel Bayerischer Hof Munich","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Sofitel Munich Bayerpost","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Mandarin Oriental Munich","budget"=>"HIGH","price"=>50000,"rating"=>4.9],
["name"=>"Hotel Vier Jahreszeiten Kempinski Munich","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Hamburg",
"image"=>"images/germany/hamburg_harbor.jpg",
"rating"=>4.6,
"points"=>[
"Major port city",
"Harbor views",
"Miniatur Wunderland",
"Modern architecture"
],
"things_to_do"=>[
"Harbor boat tour",
"Visit Miniatur Wunderland",
"Explore Speicherstadt",
"Walk along Elbphilharmonie"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o Hamburg City","budget"=>"LOW","price"=>9500,"rating"=>4.0],
["name"=>"ibis Budget Hamburg City","budget"=>"LOW","price"=>11500,"rating"=>4.1],
["name"=>"Hotel Europäischer Hof Hamburg","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"AMERON Hamburg Hotel Speicherstadt","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"The Fontenay Hamburg","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Hotel Atlantic Hamburg, Autograph Collection","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Frankfurt",
"image"=>"images/germany/frankfurt_skyline.jpg",
"rating"=>4.6,
"points"=>[
"Financial hub",
"Skyscraper skyline",
"Old town Römerberg",
"River Main views"
],
"things_to_do"=>[
"Visit Römerberg Square",
"Main Tower observation deck",
"River Main cruise",
"Palmengarten botanical garden"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o Frankfurt Galluswarte","budget"=>"LOW","price"=>9000,"rating"=>4.0],
["name"=>"ibis Budget Frankfurt City Ost","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Steigenberger Icon Frankfurter Hof","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Meliá Frankfurt City","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Jumeirah Frankfurt","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Sofitel Frankfurt Opera","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Cologne",
"image"=>"images/germany/cologne_cathedral.jpg",
"rating"=>4.7,
"points"=>[
"Cologne Cathedral",
"Rhine river cruises",
"Historic old town",
"Cultural festivals"
],
"things_to_do"=>[
"Climb Cologne Cathedral tower",
"Rhine river cruise",
"Explore Old Town",
"Visit Chocolate Museum"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o Köln Dom","budget"=>"LOW","price"=>9000,"rating"=>4.0],
["name"=>"ibis Köln Centrum","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Hotel Mondial am Dom Cologne","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Pullman Cologne","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Excelsior Hotel Ernst Cologne","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Hyatt Regency Cologne","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Heidelberg",
"image"=>"images/germany/heidelberg_castle.jpg",
"rating"=>4.7,
"points"=>[
"Romantic old town",
"Heidelberg Castle",
"Old bridge views",
"University city"
],
"things_to_do"=>[
"Visit Heidelberg Castle",
"Walk Old Bridge",
"Philosopher’s Walk hike",
"Explore Old Town streets"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Heidelberg Hauptbahnhof","budget"=>"LOW","price"=>9500,"rating"=>4.0],
["name"=>"Hotel Central Heidelberg","budget"=>"LOW","price"=>11500,"rating"=>4.1],
["name"=>"Hotel Europäischer Hof Heidelberg","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Qube Hotel Heidelberg","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Hotel Villa Marstall Heidelberg","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Die Hirschgasse Heidelberg","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Dresden",
"image"=>"images/germany/dresden_old_town.jpg",
"rating"=>4.6,
"points"=>[
"Baroque architecture",
"Elbe river views",
"Historic churches",
"Art museums"
],
"things_to_do"=>[
"Visit Frauenkirche",
"Zwinger Palace tour",
"Elbe river cruise",
"Explore Semper Opera House"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"a&o Dresden Hauptbahnhof","budget"=>"LOW","price"=>9000,"rating"=>4.0],
["name"=>"ibis Dresden Zentrum","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Hotel Taschenbergpalais Kempinski Dresden","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"NH Collection Dresden Altmarkt","budget"=>"MEDIUM","price"=>26000,"rating"=>4.5],
["name"=>"Relais & Châteaux Bülow Palais Dresden","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Hotel Suitess Dresden","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Nuremberg",
"image"=>"images/germany/nuremberg.jpg",
"rating"=>4.6,
"points"=>[
"Medieval old town",
"Christmas markets",
"Castle views",
"Historic significance"
],
"things_to_do"=>[
"Visit Nuremberg Castle",
"Explore Old Town",
"Attend Christmas Market",
"Documentation Center Museum"
],
"best_time"=>"May to September / December (Christmas)",
"hotels"=>[
["name"=>"a&o Nürnberg Hauptbahnhof","budget"=>"LOW","price"=>9000,"rating"=>4.0],
["name"=>"ibis Nürnberg Altstadt","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Hotel Victoria Nürnberg","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"NH Collection Nürnberg City","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Le Méridien Grand Hotel Nürnberg","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Sheraton Carlton Hotel Nürnberg","budget"=>"HIGH","price"=>55000,"rating"=>5.0]
]
],

[
"name"=>"Black Forest",
"image"=>"images/germany/black_forest.jpg",
"rating"=>4.8,
"points"=>[
"Dense forests",
"Scenic villages",
"Hiking trails",
"Cuckoo clocks"
],
"things_to_do"=>[
"Hiking in Triberg",
"Visit Black Forest villages",
"See Triberg Waterfalls",
"Explore Baden-Baden spa"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"ibis Styles Freiburg","budget"=>"LOW","price"=>10000,"rating"=>4.1],
["name"=>"Hotel Gasthaus Schützen Freiburg","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Saigerhöh Lenzkirch","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Hotel Bareiss Baiersbronn","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Brenners Park-Hotel & Spa Baden-Baden","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Traube Tonbach Baiersbronn","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Rothenburg ob der Tauber",
"image"=>"images/germany/rothenburg_old_town.jpg",
"rating"=>4.9,
"points"=>[
"Fairytale town",
"Medieval walls",
"Old streets",
"Romantic atmosphere"
],
"things_to_do"=>[
"Walk medieval city walls",
"Visit Market Square",
"Night watchman tour",
"Explore Christmas Museum"
],
"best_time"=>"May to September / December",
"hotels"=>[
["name"=>"Hotel Gasthof zur Linde Rothenburg","budget"=>"LOW","price"=>9500,"rating"=>4.1],
["name"=>"Hotel Goldenes Fass Rothenburg","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"Hotel Eisenhut Rothenburg","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Hotel Herrnschloesschen Rothenburg","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Hotel Reichsküchenmeister Rothenburg","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Villa Mittermeier Hotel & Restaurant Rothenburg","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
]

],

"australia" => [

[
"name"=>"Sydney",
"image"=>"images/australia/sydney_opera_house.jpg",
"rating"=>4.8,
"points"=>[
"Sydney Opera House",
"Harbour Bridge views",
"Bondi Beach",
"Vibrant city life"
],
"things_to_do"=>[
"Climb Harbour Bridge",
"Opera House tour",
"Bondi to Coogee coastal walk",
"Darling Harbour cruise"
],
"best_time"=>"September to November & March to May",
"hotels"=>[
["name"=>"ibis Budget Sydney East","budget"=>"LOW","price"=>11000,"rating"=>4.0],
["name"=>"Wake Up! Sydney Central","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Mercure Sydney","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Novotel Sydney Darling Square","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"Shangri-La Sydney","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Park Hyatt Sydney","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Melbourne",
"image"=>"images/australia/melbourne_city.jpg",
"rating"=>4.7,
"points"=>[
"Cultural capital",
"Street art & cafes",
"Sports city",
"Shopping lanes"
],
"things_to_do"=>[
"Explore Hosier Lane street art",
"Great Ocean Road trip",
"Visit Federation Square",
"Watch cricket at MCG"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"ibis Budget Melbourne CBD","budget"=>"LOW","price"=>10500,"rating"=>4.0],
["name"=>"Space Hotel Melbourne","budget"=>"LOW","price"=>12500,"rating"=>4.2],
["name"=>"Mercure Melbourne Southbank","budget"=>"MEDIUM","price"=>23000,"rating"=>4.5],
["name"=>"Novotel Melbourne on Collins","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Crown Metropol Melbourne","budget"=>"HIGH","price"=>50000,"rating"=>4.9],
["name"=>"The Langham Melbourne","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Brisbane",
"image"=>"images/australia/brisbane_river.jpg",
"rating"=>4.6,
"points"=>[
"Riverfront city",
"South Bank Parklands",
"Sunny weather",
"Modern lifestyle"
],
"things_to_do"=>[
"Stroll South Bank",
"Story Bridge climb",
"Lone Pine Koala Sanctuary",
"River cruise"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"ibis Budget Brisbane Airport","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"YHA Brisbane City","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Mercure Brisbane King George Square","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Novotel Brisbane South Bank","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Emporium Hotel South Bank Brisbane","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"W Brisbane","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Gold Coast",
"image"=>"images/australia/gold_coast_beach.jpg",
"rating"=>4.8,
"points"=>[
"Famous beaches",
"Surfing paradise",
"Theme parks",
"Nightlife"
],
"things_to_do"=>[
"Surf at Surfers Paradise",
"Visit Dreamworld",
"SkyPoint observation deck",
"Beach sunset walk"
],
"best_time"=>"April to October",
"hotels"=>[
["name"=>"ibis Budget Gold Coast","budget"=>"LOW","price"=>10500,"rating"=>4.0],
["name"=>"BUNK Surfers Paradise","budget"=>"LOW","price"=>12500,"rating"=>4.1],
["name"=>"Novotel Surfers Paradise","budget"=>"MEDIUM","price"=>23000,"rating"=>4.5],
["name"=>"QT Gold Coast","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"The Star Grand at The Star Gold Coast","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Peppers Soul Surfers Paradise","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Perth",
"image"=>"images/australia/perth.jpg",
"rating"=>4.6,
"points"=>[
"Indian Ocean sunsets",
"Kings Park",
"Clean beaches",
"Relaxed lifestyle"
],
"things_to_do"=>[
"Visit Kings Park",
"Rottnest Island trip",
"Cottesloe Beach sunset",
"Swan River cruise"
],
"best_time"=>"September to November",
"hotels"=>[
["name"=>"ibis Budget Perth","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"The Emperors Crown Hostel Perth","budget"=>"LOW","price"=>12000,"rating"=>4.1],
["name"=>"Mercure Perth","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Novotel Perth Langley","budget"=>"MEDIUM","price"=>25000,"rating"=>4.5],
["name"=>"The Ritz-Carlton Perth","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"COMO The Treasury Perth","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Adelaide",
"image"=>"images/australia/adelaide.jpg",
"rating"=>4.5,
"points"=>[
"Wine regions nearby",
"Festival city",
"Historic buildings",
"Relaxed pace"
],
"things_to_do"=>[
"Barossa Valley wine tour",
"Visit Adelaide Central Market",
"Glenelg Beach trip",
"Festival events"
],
"best_time"=>"March to May",
"hotels"=>[
["name"=>"ibis Adelaide","budget"=>"LOW","price"=>10500,"rating"=>4.1],
["name"=>"YHA Adelaide Central","budget"=>"LOW","price"=>12500,"rating"=>4.2],
["name"=>"Mercure Adelaide Grosvenor Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Novotel Adelaide","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Mayfair Hotel Adelaide","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"InterContinental Adelaide","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Canberra",
"image"=>"images/australia/canberra.jpg",
"rating"=>4.4,
"points"=>[
"Capital city",
"National museums",
"Parliament House",
"Planned city layout"
],
"things_to_do"=>[
"Visit Parliament House",
"Australian War Memorial",
"National Gallery tour",
"Lake Burley Griffin walk"
],
"best_time"=>"September to November",
"hotels"=>[
["name"=>"ibis Budget Canberra","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"Canberra City YHA","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Mercure Canberra","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Novotel Canberra","budget"=>"MEDIUM","price"=>25000,"rating"=>4.5],
["name"=>"Hotel Realm Canberra","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Hyatt Hotel Canberra – A Park Hyatt Hotel","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Hobart",
"image"=>"images/australia/hobart.jpg",
"rating"=>4.6,
"points"=>[
"Tasmania gateway",
"Historic harbor",
"MONA museum",
"Cool climate"
],
"things_to_do"=>[
"Visit MONA Museum",
"Mount Wellington hike",
"Salamanca Market",
"Bruny Island day trip"
],
"best_time"=>"December to March",
"hotels"=>[
["name"=>"ibis Styles Hobart","budget"=>"LOW","price"=>10000,"rating"=>4.1],
["name"=>"Montacute Boutique Bunkhouse Hobart","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Grand Chancellor Hobart","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Mantra One Sandy Bay Road Hobart","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"MACq 01 Hotel Hobart","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"The Henry Jones Art Hotel Hobart","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Cairns",
"image"=>"images/australia/cairns.jpg",
"rating"=>4.7,
"points"=>[
"Great Barrier Reef",
"Tropical rainforest",
"Snorkeling & diving",
"Adventure tours"
],
"things_to_do"=>[
"Great Barrier Reef dive",
"Daintree Rainforest tour",
"Kuranda Scenic Railway",
"Skyrail rainforest cableway"
],
"best_time"=>"June to October",
"hotels"=>[
["name"=>"ibis Styles Cairns","budget"=>"LOW","price"=>10000,"rating"=>4.1],
["name"=>"Gilligan's Backpackers Hotel & Resort Cairns","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Novotel Cairns Oasis Resort","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Pullman Cairns International","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Shangri-La The Marina Cairns","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Crystalbrook Riley Cairns","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Uluru",
"image"=>"images/australia/uluru_ayers_rock.jpg",
"rating"=>4.9,
"points"=>[
"Sacred rock formation",
"Sunrise & sunset views",
"Aboriginal culture",
"Desert landscapes"
],
"things_to_do"=>[
"Uluru base walk",
"Sunset viewing tour",
"Kata Tjuta hike",
"Aboriginal cultural experience"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"Outback Pioneer Lodge Uluru","budget"=>"LOW","price"=>13000,"rating"=>4.1],
["name"=>"Desert Palms Alice Springs","budget"=>"LOW","price"=>15000,"rating"=>4.2],
["name"=>"Emu Walk Apartments Uluru","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Desert Gardens Hotel Uluru","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"Sails in the Desert Uluru","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Longitude 131° Uluru","budget"=>"HIGH","price"=>78000,"rating"=>5.0]
]
]

],

"new_zealand" => [

[
"name"=>"Auckland",
"image"=>"images/new_zealand/auckland_city.jpg",
"rating"=>4.7,
"points"=>[
"Sky Tower views",
"Harbour cruises",
"Urban beaches",
"Modern city life"
],
"things_to_do"=>[
"Sky Tower observation deck",
"Waiheke Island ferry trip",
"Auckland Harbour cruise",
"Mission Bay beach walk"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"ibis Budget Auckland Central","budget"=>"LOW","price"=>10500,"rating"=>4.0],
["name"=>"Kiwi International Hotel Auckland","budget"=>"LOW","price"=>12500,"rating"=>4.1],
["name"=>"Rydges Auckland","budget"=>"MEDIUM","price"=>23000,"rating"=>4.5],
["name"=>"Novotel Auckland Airport","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Cordis, Auckland by Langham Hospitality Group","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Park Hyatt Auckland","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Queenstown",
"image"=>"images/new_zealand/queenstown_lake.jpg",
"rating"=>4.9,
"points"=>[
"Adventure capital",
"Lake Wakatipu",
"Bungee jumping",
"Mountain scenery"
],
"things_to_do"=>[
"Shotover Jet boating",
"Skyline Gondola ride",
"Nevis Bungee jump",
"Milford Sound day tour"
],
"best_time"=>"December to February & June to August",
"hotels"=>[
["name"=>"Nomads Queenstown Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Blue Peaks Lodge Queenstown","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Rydges Lakeland Resort Queenstown","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Novotel Queenstown Lakeside","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"QT Queenstown","budget"=>"HIGH","price"=>50000,"rating"=>4.9],
["name"=>"Eichardt's Private Hotel Queenstown","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Rotorua",
"image"=>"images/new_zealand/rotorua_geysers.jpg",
"rating"=>4.7,
"points"=>[
"Geothermal parks",
"Maori culture",
"Hot springs",
"Adventure activities"
],
"things_to_do"=>[
"Wai-O-Tapu geothermal park",
"Maori cultural show",
"Polynesian Spa",
"Redwoods forest biking"
],
"best_time"=>"September to April",
"hotels"=>[
["name"=>"ibis Rotorua","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"YHA Rotorua","budget"=>"LOW","price"=>12000,"rating"=>4.1],
["name"=>"Millennium Hotel Rotorua","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Novotel Rotorua Lakeside","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Pullman Rotorua","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Regent of Rotorua Boutique Hotel","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Christchurch",
"image"=>"images/new_zealand/christchurch_city.jpg",
"rating"=>4.6,
"points"=>[
"Garden city",
"Historic architecture",
"Botanical gardens",
"Cultural hubs"
],
"things_to_do"=>[
"Christchurch Botanic Gardens",
"Tram city tour",
"Akaroa day trip",
"Canterbury Museum visit"
],
"best_time"=>"December to March",
"hotels"=>[
["name"=>"ibis Christchurch","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"Jailhouse Accommodation Christchurch","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Hotel Give Christchurch","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Novotel Christchurch Cathedral Square","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"The George Christchurch","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Fable Christchurch","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Wellington",
"image"=>"images/new_zealand/wellington_harbor.jpg",
"rating"=>4.6,
"points"=>[
"Capital city",
"Te Papa Museum",
"Waterfront cafes",
"Creative culture"
],
"things_to_do"=>[
"Te Papa museum visit",
"Cable car ride",
"Mount Victoria lookout",
"Cuba Street walk"
],
"best_time"=>"January to March",
"hotels"=>[
["name"=>"ibis Wellington","budget"=>"LOW","price"=>10000,"rating"=>4.0],
["name"=>"YHA Wellington","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Travelodge Hotel Wellington","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Novotel Wellington","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"InterContinental Wellington","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"QT Wellington","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Milford Sound",
"image"=>"images/new_zealand/milford_sound.jpg",
"rating"=>4.9,
"points"=>[
"Fiord landscapes",
"Cruise experiences",
"Waterfalls",
"Natural beauty"
],
"things_to_do"=>[
"Milford Sound cruise",
"Kayaking adventure",
"Waterfall photography",
"Scenic flight tour"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Milford Sound Lodge (Chalet)","budget"=>"LOW","price"=>14000,"rating"=>4.2],
["name"=>"Milford Sound Lodge (Campervan Site)","budget"=>"LOW","price"=>16000,"rating"=>4.1],
["name"=>"Te Anau Lakeview Holiday Park","budget"=>"MEDIUM","price"=>22000,"rating"=>4.4],
["name"=>"Distinction Te Anau Hotel & Villas","budget"=>"MEDIUM","price"=>25000,"rating"=>4.5],
["name"=>"Fiordland Lodge Te Anau","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Blanket Bay Lodge (near Milford Sound)","budget"=>"HIGH","price"=>70000,"rating"=>5.0]
]
],

[
"name"=>"Lake Tekapo",
"image"=>"images/new_zealand/lake_tekapo.jpg",
"rating"=>4.8,
"points"=>[
"Turquoise lake",
"Church of the Good Shepherd",
"Stargazing",
"Scenic views"
],
"things_to_do"=>[
"Mount John Observatory",
"Tekapo Springs",
"Church photography",
"Lake kayaking"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"YHA Lake Tekapo","budget"=>"LOW","price"=>10500,"rating"=>4.1],
["name"=>"Lake Tekapo Motels & Holiday Park","budget"=>"LOW","price"=>12500,"rating"=>4.2],
["name"=>"Peppers Bluewater Resort Lake Tekapo","budget"=>"MEDIUM","price"=>23000,"rating"=>4.5],
["name"=>"Mantra Lake Tekapo","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Tekapo Springs Luxury Suites","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Mt John Observatory Lodge (Luxury Stay)","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
],

[
"name"=>"Mount Cook",
"image"=>"images/new_zealand/mount_cook.jpg",
"rating"=>4.9,
"points"=>[
"Highest mountain peak",
"Glacier views",
"Hiking trails",
"Alpine scenery"
],
"things_to_do"=>[
"Hooker Valley Track hike",
"Glacier kayaking",
"Scenic helicopter ride",
"Stargazing experience"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Mt Cook Lodge & Motels","budget"=>"LOW","price"=>12000,"rating"=>4.1],
["name"=>"Aoraki Court Motel Mount Cook","budget"=>"LOW","price"=>14500,"rating"=>4.2],
["name"=>"Mount Cook Alpine Lodge","budget"=>"MEDIUM","price"=>23000,"rating"=>4.4],
["name"=>"The Hermitage Hotel Mount Cook (Alpine Wing)","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"The Hermitage Hotel Mount Cook (Premium Room)","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Minaret Station Alpine Lodge (near Mount Cook)","budget"=>"HIGH","price"=>75000,"rating"=>5.0]
]
],

[
"name"=>"Taupo",
"image"=>"images/new_zealand/taupo.jpg",
"rating"=>4.6,
"points"=>[
"Lake Taupo",
"Huka Falls",
"Water activities",
"Relaxed town vibe"
],
"things_to_do"=>[
"Huka Falls visit",
"Lake Taupo cruise",
"Skydiving adventure",
"Hot water beach soak"
],
"best_time"=>"December to March",
"hotels"=>[
["name"=>"Haka Lodge Taupo","budget"=>"LOW","price"=>9500,"rating"=>4.1],
["name"=>"Beechtree Motel Taupo","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"Millennium Hotel & Resort Manuels Taupo","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Novotel Taupo","budget"=>"MEDIUM","price"=>25000,"rating"=>4.6],
["name"=>"Hilton Lake Taupo","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Sacred Waters Taupo","budget"=>"HIGH","price"=>60000,"rating"=>5.0]
]
],

[
"name"=>"Franz Josef Glacier",
"image"=>"images/new_zealand/franz_josef.jpg",
"rating"=>4.8,
"points"=>[
"Glacier walks",
"Heli-hiking",
"Rainforest scenery",
"Adventure tourism"
],
"things_to_do"=>[
"Helicopter glacier hike",
"Hot pools relaxation",
"Rainforest trails",
"Scenic viewpoints"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"YHA Franz Josef Glacier","budget"=>"LOW","price"=>9500,"rating"=>4.1],
["name"=>"Rainforest Retreat Franz Josef","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Scenic Hotel Franz Josef Glacier","budget"=>"MEDIUM","price"=>22000,"rating"=>4.5],
["name"=>"Westwood Lodge Franz Josef","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Te Waonui Forest Retreat Franz Josef","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Franz Josef Oasis","budget"=>"HIGH","price"=>62000,"rating"=>5.0]
]
]

],

"canada" => [

[
"name"=>"Toronto",
"image"=>"images/canada/toronto_cn_tower.jpg",
"rating"=>4.7,
"points"=>[
"CN Tower views",
"Multicultural city",
"Shopping & nightlife",
"Lake Ontario waterfront"
],
"things_to_do"=>[
"CN Tower EdgeWalk",
"Toronto Islands ferry",
"Distillery District walk",
"Harbourfront cruise"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"HI Toronto Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"ibis Toronto Downtown","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Chelsea Hotel Toronto","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Novotel Toronto Centre","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"Fairmont Royal York Toronto","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Ritz-Carlton Toronto","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Vancouver",
"image"=>"images/canada/vancouver_city.jpg",
"rating"=>4.8,
"points"=>[
"Stanley Park",
"Mountain & ocean views",
"Outdoor activities",
"Modern city vibe"
],
"things_to_do"=>[
"Cycle Stanley Park",
"Capilano Suspension Bridge",
"Grouse Mountain hike",
"Granville Island visit"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"HI Vancouver Downtown Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"ibis Vancouver City Centre","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Pinnacle Hotel Harbourfront Vancouver","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Sheraton Vancouver Wall Centre","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"Fairmont Waterfront Vancouver","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Rosewood Hotel Georgia Vancouver","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Montreal",
"image"=>"images/canada/montreal_old_port.jpg",
"rating"=>4.7,
"points"=>[
"French culture",
"Historic Old Montreal",
"Festivals & nightlife",
"Culinary scene"
],
"things_to_do"=>[
"Old Montreal walking tour",
"Mount Royal viewpoint",
"Notre-Dame Basilica visit",
"Food tasting tour"
],
"best_time"=>"May to October",
"hotels"=>[
["name"=>"HI Montreal Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.1],
["name"=>"Hotel Chrome Montreal","budget"=>"LOW","price"=>13000,"rating"=>4.2],
["name"=>"Hotel Bonaventure Montreal","budget"=>"MEDIUM","price"=>24000,"rating"=>4.5],
["name"=>"Novotel Montreal Centre","budget"=>"MEDIUM","price"=>27000,"rating"=>4.6],
["name"=>"Fairmont The Queen Elizabeth Montreal","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Ritz-Carlton Montreal","budget"=>"HIGH","price"=>68000,"rating"=>5.0]
]
],

[
"name"=>"Quebec City",
"image"=>"images/canada/quebec_city.jpg",
"rating"=>4.8,
"points"=>[
"Old town charm",
"European feel",
"Historic walls",
"Scenic river views"
],
"things_to_do"=>[
"Château Frontenac tour",
"Old Quebec walk",
"Montmorency Falls visit",
"St. Lawrence river cruise"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"Auberge Internationale de Québec","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Hotel Manoir de l'Esplanade","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Hotel Clarendon","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Hilton Quebec","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Fairmont Le Château Frontenac","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Auberge Saint-Antoine","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Banff",
"image"=>"images/canada/banff_national_park.jpg",
"rating"=>4.9,
"points"=>[
"Rocky Mountains",
"Banff National Park",
"Scenic lakes",
"Outdoor adventures"
],
"things_to_do"=>[
"Lake Moraine visit",
"Banff Gondola ride",
"Hot springs soak",
"Wildlife safari"
],
"best_time"=>"June to September & December to March",
"hotels"=>[
["name"=>"HI Banff Alpine Centre","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Banff Aspen Lodge","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Banff Rocky Mountain Resort","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Moose Hotel & Suites","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Fairmont Banff Springs","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Rimrock Resort Hotel Banff","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Lake Louise",
"image"=>"images/canada/lake_louise.jpg",
"rating"=>4.9,
"points"=>[
"Turquoise lake",
"Mountain backdrop",
"Photography spot",
"Hiking trails"
],
"things_to_do"=>[
"Canoe on Lake Louise",
"Lake Agnes hike",
"Sunrise photography",
"Icefields Parkway drive"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"HI Lake Louise Alpine Centre","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Lake Louise Inn","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Mountaineer Lodge","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Paradise Lodge & Bungalows","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Fairmont Chateau Lake Louise","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Deer Lodge","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Niagara Falls",
"image"=>"images/canada/niagara_falls.jpg",
"rating"=>4.8,
"points"=>[
"World-famous waterfalls",
"Boat tours",
"Night illumination",
"Honeymoon destination"
],
"things_to_do"=>[
"Boat ride to the falls",
"Skylon Tower view",
"Journey Behind the Falls",
"Clifton Hill walk"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"HI Niagara Falls Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"Days Inn by Wyndham Niagara Falls Centre St.","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Wyndham Fallsview Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Sheraton Fallsview Hotel","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Niagara Falls Marriott Fallsview Hotel & Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Fallsview Hotel (Luxury Suites)","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Ottawa",
"image"=>"images/canada/ottawa_parliament.jpg",
"rating"=>4.6,
"points"=>[
"Capital city",
"Parliament Hill",
"Museums",
"Rideau Canal"
],
"things_to_do"=>[
"Parliament tour",
"Rideau Canal cruise",
"ByWard Market visit",
"Canadian Museum of History"
],
"best_time"=>"May to September",
"hotels"=>[
["name"=>"HI Ottawa Jail Hostel","budget"=>"LOW","price"=>11000,"rating"=>4.2],
["name"=>"ByWard Blue Inn","budget"=>"LOW","price"=>13500,"rating"=>4.3],
["name"=>"Lord Elgin Hotel","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Sheraton Ottawa Hotel","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Fairmont Château Laurier","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Andaz Ottawa ByWard Market","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Whistler",
"image"=>"images/canada/whistler_resort.jpg",
"rating"=>4.9,
"points"=>[
"Ski resort",
"Mountain village",
"Winter sports",
"Luxury stays"
],
"things_to_do"=>[
"Peak 2 Peak Gondola",
"Ski & snowboarding",
"Mountain biking",
"Scandinave Spa"
],
"best_time"=>"December to March & June to August",
"hotels"=>[
["name"=>"HI Whistler","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Whistler Village Inn + Suites","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Aava Whistler Hotel","budget"=>"MEDIUM","price"=>23000,"rating"=>4.6],
["name"=>"Crystal Lodge Whistler","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Fairmont Chateau Whistler","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Four Seasons Resort Whistler","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Jasper",
"image"=>"images/canada/jasper_national_park.jpg",
"rating"=>4.8,
"points"=>[
"Jasper National Park",
"Wildlife spotting",
"Dark Sky Preserve",
"Nature & tranquility"
],
"things_to_do"=>[
"Maligne Lake cruise",
"Athabasca Falls visit",
"Stargazing experience",
"Wildlife tour"
],
"best_time"=>"June to September",
"hotels"=>[
["name"=>"HI Jasper","budget"=>"LOW","price"=>11500,"rating"=>4.2],
["name"=>"Marmot Lodge","budget"=>"LOW","price"=>14000,"rating"=>4.3],
["name"=>"Chateau Jasper","budget"=>"MEDIUM","price"=>22500,"rating"=>4.6],
["name"=>"Forest Park Hotel","budget"=>"MEDIUM","price"=>25500,"rating"=>4.7],
["name"=>"Fairmont Jasper Park Lodge","budget"=>"HIGH","price"=>45000,"rating"=>4.9],
["name"=>"Pyramid Lake Lodge","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
]

],

"dubai" => [

[
"name"=>"Burj Khalifa",
"image"=>"images/dubai/burj_khalifa.jpg",
"rating"=>4.9,
"points"=>[
"World’s tallest building",
"Observation decks",
"Dubai skyline views",
"Luxury experience"
],
"things_to_do"=>[
"At The Top Sky visit",
"Dubai Fountain show",
"Sky Lounge dining",
"Sunset photography"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"Rove Downtown Dubai","budget"=>"LOW","price"=>16000,"rating"=>4.4],
["name"=>"Hotel Boulevard, Autograph Collection","budget"=>"LOW","price"=>18500,"rating"=>4.5],
["name"=>"DAMAC Maison Downtown","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Address Dubai Mall","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Armani Hotel Dubai (Burj Khalifa)","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Palace Downtown","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Dubai Mall",
"image"=>"images/dubai/dubai_mall.jpg",
"rating"=>4.8,
"points"=>[
"World’s largest mall",
"Luxury shopping",
"Dubai Aquarium",
"Entertainment hub"
],
"things_to_do"=>[
"Dubai Aquarium visit",
"Ice rink experience",
"VR Park adventure",
"Luxury brand shopping"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"Rove Downtown Dubai","budget"=>"LOW","price"=>16000,"rating"=>4.4],
["name"=>"Vida Downtown","budget"=>"LOW","price"=>18500,"rating"=>4.5],
["name"=>"DAMAC Maison Mall Street","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Address Fountain Views","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Armani Hotel Dubai","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Address Downtown","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Palm Jumeirah",
"image"=>"images/dubai/palm_jumeirah.jpg",
"rating"=>4.9,
"points"=>[
"Man-made island",
"Luxury resorts",
"Beach clubs",
"Aerial views"
],
"things_to_do"=>[
"Atlantis Aquaventure",
"Palm Monorail ride",
"Skydiving over Palm",
"Beach club day pass"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Aloft Palm Jumeirah","budget"=>"LOW","price"=>18000,"rating"=>4.3],
["name"=>"NH Collection Dubai The Palm","budget"=>"LOW","price"=>20500,"rating"=>4.4],
["name"=>"Fairmont The Palm","budget"=>"MEDIUM","price"=>30000,"rating"=>4.6],
["name"=>"W Dubai – The Palm","budget"=>"MEDIUM","price"=>34000,"rating"=>4.7],
["name"=>"Atlantis The Palm","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"One&Only The Palm","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Dubai Marina",
"image"=>"images/dubai/dubai_marina.jpg",
"rating"=>4.8,
"points"=>[
"Waterfront skyline",
"Marina Walk",
"Yacht cruises",
"Nightlife"
],
"things_to_do"=>[
"Luxury yacht cruise",
"Marina Walk evening stroll",
"Skydive Dubai",
"Beach at JBR"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Rove Dubai Marina","budget"=>"LOW","price"=>17000,"rating"=>4.4],
["name"=>"Ibis Dubai Marina","budget"=>"LOW","price"=>19500,"rating"=>4.3],
["name"=>"JA Ocean View Hotel","budget"=>"MEDIUM","price"=>28000,"rating"=>4.6],
["name"=>"InterContinental Dubai Marina","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"Le Royal Meridien Beach Resort & Spa","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Address Dubai Marina","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Jumeirah Beach",
"image"=>"images/dubai/jumeirah_beach.jpg",
"rating"=>4.7,
"points"=>[
"White sand beaches",
"Burj Al Arab views",
"Relaxation",
"Beach activities"
],
"things_to_do"=>[
"Beach sunbathing",
"Water sports",
"Burj Al Arab photo stop",
"Sunset walk"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Rove La Mer Beach","budget"=>"LOW","price"=>18000,"rating"=>4.4],
["name"=>"La Ville Hotel & Suites City Walk","budget"=>"LOW","price"=>20500,"rating"=>4.5],
["name"=>"Jumeirah Beach Hotel","budget"=>"MEDIUM","price"=>32000,"rating"=>4.6],
["name"=>"Mandarin Oriental Jumeira, Dubai","budget"=>"MEDIUM","price"=>36000,"rating"=>4.7],
["name"=>"Burj Al Arab Jumeirah","budget"=>"HIGH","price"=>85000,"rating"=>4.9],
["name"=>"Four Seasons Resort Dubai at Jumeirah Beach","budget"=>"HIGH","price"=>65000,"rating"=>5.0]
]
],

[
"name"=>"Desert Safari",
"image"=>"images/dubai/desert_safari.jpg",
"rating"=>4.9,
"points"=>[
"Dune bashing",
"Camel rides",
"Cultural shows",
"Sunset photography"
],
"things_to_do"=>[
"Dune bashing",
"Camel riding",
"BBQ dinner camp",
"Belly dance show"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Al Badayer Retreat","budget"=>"LOW","price"=>18000,"rating"=>4.3],
["name"=>"Al Maha Desert Camp (Standard Tents)","budget"=>"LOW","price"=>22000,"rating"=>4.4],
["name"=>"Bab Al Shams Desert Resort","budget"=>"MEDIUM","price"=>35000,"rating"=>4.6],
["name"=>"The Ritz-Carlton Ras Al Khaimah, Al Wadi Desert","budget"=>"MEDIUM","price"=>42000,"rating"=>4.7],
["name"=>"Al Maha, a Luxury Collection Desert Resort & Spa","budget"=>"HIGH","price"=>65000,"rating"=>4.9],
["name"=>"Sonara Camp by Dubai Desert Conservation Reserve","budget"=>"HIGH","price"=>75000,"rating"=>5.0]
]
],

[
"name"=>"Global Village",
"image"=>"images/dubai/global_village.jpg",
"rating"=>4.6,
"points"=>[
"Cultural pavilions",
"Global shopping",
"Food stalls",
"Live performances"
],
"things_to_do"=>[
"International shopping",
"Street food tasting",
"Cultural shows",
"Carnival rides"
],
"best_time"=>"November to April",
"hotels"=>[
["name"=>"Millennium Al Barsha","budget"=>"LOW","price"=>16000,"rating"=>4.3],
["name"=>"Rove City Walk (near Global Village)","budget"=>"LOW","price"=>18500,"rating"=>4.4],
["name"=>"Novotel Dubai Al Barsha","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Aloft Me'aisam","budget"=>"MEDIUM","price"=>29000,"rating"=>4.7],
["name"=>"Studio One Hotel Dubai","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Bab Al Shams Desert Resort","budget"=>"HIGH","price"=>52000,"rating"=>5.0]
]
],

[
"name"=>"Dubai Frame",
"image"=>"images/dubai/dubai_frame.jpg",
"rating"=>4.7,
"points"=>[
"Iconic architecture",
"Old vs New Dubai view",
"Glass sky bridge",
"Photography spot"
],
"things_to_do"=>[
"Sky bridge walk",
"Panoramic photography",
"Museum experience",
"Sunset visit"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"Rove Trade Centre","budget"=>"LOW","price"=>16000,"rating"=>4.4],
["name"=>"Ibis One Central","budget"=>"LOW","price"=>18500,"rating"=>4.3],
["name"=>"Novotel World Trade Centre Dubai","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Hyatt Regency Dubai Creek Heights","budget"=>"MEDIUM","price"=>30000,"rating"=>4.7],
["name"=>"Jumeirah Emirates Towers","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Palazzo Versace Dubai","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Museum of the Future",
"image"=>"images/dubai/museum_of_the_future.jpg",
"rating"=>4.8,
"points"=>[
"Futuristic architecture",
"Innovative exhibits",
"Technology showcase",
"Iconic landmark"
],
"things_to_do"=>[
"Interactive exhibits",
"AI & space displays",
"Immersive experience",
"Photography tour"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Rove Trade Centre","budget"=>"LOW","price"=>16500,"rating"=>4.4],
["name"=>"ibis World Trade Centre","budget"=>"LOW","price"=>18500,"rating"=>4.3],
["name"=>"Novotel World Trade Centre Dubai","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Jumeirah Emirates Towers","budget"=>"MEDIUM","price"=>32000,"rating"=>4.7],
["name"=>"The Ritz-Carlton, DIFC","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Shangri-La Dubai","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Al Fahidi Historical District",
"image"=>"images/dubai/al_fahidi.jpg",
"rating"=>4.6,
"points"=>[
"Old Dubai heritage",
"Traditional architecture",
"Museums & art",
"Cultural insight"
],
"things_to_do"=>[
"Al Fahidi walk",
"Dubai Museum visit",
"Abra boat ride",
"Art gallery tour"
],
"best_time"=>"November to March",
"hotels"=>[
["name"=>"Arabian Courtyard Hotel & Spa","budget"=>"LOW","price"=>15000,"rating"=>4.3],
["name"=>"XVA Art Hotel","budget"=>"LOW","price"=>17000,"rating"=>4.4],
["name"=>"Al Seef Heritage Hotel Dubai, Curio Collection by Hilton","budget"=>"MEDIUM","price"=>26000,"rating"=>4.6],
["name"=>"Canopy by Hilton Dubai Al Seef","budget"=>"MEDIUM","price"=>30000,"rating"=>4.7],
["name"=>"Hyatt Regency Dubai Creek Heights","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Palazzo Versace Dubai","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
]

],

"egypt" => [

[
"name"=>"Giza Pyramids",
"image"=>"images/egypt/pyramids_of_giza.jpg",
"rating"=>4.9,
"points"=>[
"Great Pyramid of Giza",
"Sphinx monument",
"Ancient wonders",
"World heritage site"
],
"things_to_do"=>[
"Camel ride near pyramids",
"Sound & Light show",
"Explore Great Pyramid interior",
"Sunset photography"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Guardian Guest House","budget"=>"LOW","price"=>9000,"rating"=>4.3],
["name"=>"Pyramids View Inn","budget"=>"LOW","price"=>11500,"rating"=>4.4],
["name"=>"Steigenberger Pyramids Cairo","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Marriott Mena House, Cairo","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Le Méridien Pyramids Hotel & Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Four Seasons Hotel Cairo at Nile Plaza","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Cairo",
"image"=>"images/egypt/cairo.jpg",
"rating"=>4.7,
"points"=>[
"Capital city",
"Egyptian Museum",
"Islamic architecture",
"Local markets"
],
"things_to_do"=>[
"Visit Egyptian Museum",
"Khan El Khalili market shopping",
"Nile dinner cruise",
"Citadel of Saladin tour"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Holy Sheet Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"City View Hotel Cairo","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Steigenberger Hotel El Tahrir","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Kempinski Nile Hotel Cairo","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Four Seasons Hotel Cairo at Nile Plaza","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"The Nile Ritz-Carlton Cairo","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Luxor",
"image"=>"images/egypt/luxor_temple.jpg",
"rating"=>4.9,
"points"=>[
"Valley of the Kings",
"Karnak Temple",
"Ancient tombs",
"Open-air museum"
],
"things_to_do"=>[
"Hot air balloon ride",
"Explore Valley of Kings",
"Karnak Temple tour",
"Nile cruise stop"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Happy Land Luxor","budget"=>"LOW","price"=>8000,"rating"=>4.2],
["name"=>"Nefertiti Hotel Luxor","budget"=>"LOW","price"=>10500,"rating"=>4.3],
["name"=>"Steigenberger Nile Palace Luxor","budget"=>"MEDIUM","price"=>20000,"rating"=>4.6],
["name"=>"Sonesta St. George Hotel Luxor","budget"=>"MEDIUM","price"=>23000,"rating"=>4.7],
["name"=>"Hilton Luxor Resort & Spa","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Al Moudira Hotel","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Aswan",
"image"=>"images/egypt/aswan_nile.jpg",
"rating"=>4.7,
"points"=>[
"Nile River views",
"Philae Temple",
"Nubian culture",
"Peaceful atmosphere"
],
"things_to_do"=>[
"Felucca boat ride",
"Visit Philae Temple",
"Nubian village tour",
"High Dam visit"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Nubian Lotus Eco Hotel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Oscar Hotel Aswan","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Basma Hotel Aswan","budget"=>"MEDIUM","price"=>20000,"rating"=>4.6],
["name"=>"Mövenpick Resort Aswan","budget"=>"MEDIUM","price"=>23000,"rating"=>4.7],
["name"=>"Sofitel Legend Old Cataract Aswan","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Pyramisa Isis Island Resort Aswan","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Alexandria",
"image"=>"images/egypt/alexandria_library.jpg",
"rating"=>4.6,
"points"=>[
"Mediterranean coastline",
"Bibliotheca Alexandrina",
"Historic forts",
"Seafood cuisine"
],
"things_to_do"=>[
"Library of Alexandria visit",
"Qaitbay Citadel tour",
"Corniche seaside walk",
"Seafood dining"
],
"best_time"=>"April to October",
"hotels"=>[
["name"=>"Alexander the Great Hostel","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Cherry Maryski Hotel","budget"=>"LOW","price"=>11000,"rating"=>4.3],
["name"=>"Romance Alexandria Hotel","budget"=>"MEDIUM","price"=>20000,"rating"=>4.6],
["name"=>"Hilton Alexandria Corniche","budget"=>"MEDIUM","price"=>23000,"rating"=>4.7],
["name"=>"Four Seasons Hotel Alexandria at San Stefano","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Helnan Royal Hotel Montazah","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Sharm El Sheikh",
"image"=>"images/egypt/sharm_el_sheikh.jpg",
"rating"=>4.8,
"points"=>[
"Red Sea beaches",
"Snorkeling & diving",
"Resort town",
"Nightlife"
],
"things_to_do"=>[
"Scuba diving",
"Snorkeling reefs",
"Quad biking desert",
"Naama Bay nightlife"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"Falcon Hills Hotel","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Dive Inn Resort","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Jaz Fanara Resort","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Stella Di Mare Beach Hotel & Spa","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Rixos Sharm El Sheikh","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"Four Seasons Resort Sharm El Sheikh","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Hurghada",
"image"=>"images/egypt/hurghada.jpg",
"rating"=>4.7,
"points"=>[
"Beach resorts",
"Water sports",
"Red Sea marine life",
"Relaxation"
],
"things_to_do"=>[
"Island hopping tour",
"Snorkeling trip",
"Parasailing",
"Desert safari ride"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"Sea Garden Hotel Hurghada","budget"=>"LOW","price"=>12000,"rating"=>4.2],
["name"=>"Arabella Azur Resort","budget"=>"LOW","price"=>14500,"rating"=>4.3],
["name"=>"Jaz Aquamarine Resort","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Steigenberger Aqua Magic","budget"=>"MEDIUM","price"=>26000,"rating"=>4.7],
["name"=>"Rixos Premium Magawish","budget"=>"HIGH","price"=>48000,"rating"=>4.9],
["name"=>"The Oberoi Beach Resort Sahl Hasheesh","budget"=>"HIGH","price"=>58000,"rating"=>5.0]
]
],

[
"name"=>"Abu Simbel",
"image"=>"images/egypt/abu_simbel.jpg",
"rating"=>4.8,
"points"=>[
"Rock temples",
"Ramses II statues",
"UNESCO site",
"Ancient engineering marvel"
],
"things_to_do"=>[
"Temple exploration",
"Sun alignment event",
"Lake Nasser view",
"Photography tour"
],
"best_time"=>"October to March",
"hotels"=>[
["name"=>"Eskaleh Nubian Ecolodge","budget"=>"LOW","price"=>8500,"rating"=>4.2],
["name"=>"Seti Abu Simbel Hotel","budget"=>"LOW","price"=>12000,"rating"=>4.3],
["name"=>"Azal Lagoons Resort Abu Simbel","budget"=>"MEDIUM","price"=>20000,"rating"=>4.6],
["name"=>"Abu Simbel Lake Resort","budget"=>"MEDIUM","price"=>23000,"rating"=>4.7],
["name"=>"Seti Abu Simbel Hotel (Lake View Rooms)","budget"=>"HIGH","price"=>38000,"rating"=>4.9],
["name"=>"Luxury Nile Cruise Stay (Aswan–Abu Simbel route)","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Siwa Oasis",
"image"=>"images/egypt/siwa_oasis.jpg",
"rating"=>4.6,
"points"=>[
"Desert oasis",
"Salt lakes",
"Traditional Berber culture",
"Natural springs"
],
"things_to_do"=>[
"Salt lake float",
"Desert safari",
"Cleopatra’s Spring visit",
"Shali Fortress tour"
],
"best_time"=>"October to April",
"hotels"=>[
["name"=>"Shali Lodge Siwa","budget"=>"LOW","price"=>9000,"rating"=>4.2],
["name"=>"Siwa Paradise Hotel","budget"=>"LOW","price"=>12000,"rating"=>4.3],
["name"=>"Ghaliet Ecolodge & Spa","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Albaben Siwa Hotel","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Adrère Amellal Desert Ecolodge","budget"=>"HIGH","price"=>52000,"rating"=>4.9],
["name"=>"Taziry Ecolodge Siwa","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
],

[
"name"=>"Dahab",
"image"=>"images/egypt/dahab.jpg",
"rating"=>4.7,
"points"=>[
"Bohemian beach town",
"Blue Hole diving",
"Relaxed vibe",
"Backpacker friendly"
],
"things_to_do"=>[
"Blue Hole dive",
"Windsurfing",
"Desert quad biking",
"Beachside cafes"
],
"best_time"=>"March to May & September to November",
"hotels"=>[
["name"=>"Rafiki Hostel Dahab","budget"=>"LOW","price"=>9000,"rating"=>4.3],
["name"=>"Sheikh Ali Dahab Resort","budget"=>"LOW","price"=>12000,"rating"=>4.4],
["name"=>"Tropitel Dahab Oasis","budget"=>"MEDIUM","price"=>22000,"rating"=>4.6],
["name"=>"Safir Dahab Resort","budget"=>"MEDIUM","price"=>25000,"rating"=>4.7],
["name"=>"Le Méridien Dahab Resort","budget"=>"HIGH","price"=>42000,"rating"=>4.9],
["name"=>"Swiss Inn Resort Dahab","budget"=>"HIGH","price"=>48000,"rating"=>5.0]
]
]

],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Easy Go | <?= $country ?> Travel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* { margin:0; padding:0; box-sizing:border-box; font-family:"Segoe UI", Arial, sans-serif; }

/* BACKGROUND */
body {
    color: #000;
    padding-top: 75px; /* space for navbar */
    position: relative;
    overflow-x: hidden;
    background: none; /* remove white bg */
}

body::before {
    content: "";
    position: fixed;
    top:0; left:0;
    width:100%; height:100%;
    background: url('images/bg-home.jpg') center/cover no-repeat;
    filter: blur(25px) brightness(0.6);
    z-index: -1;
}

/* NAVBAR */
.nav-transparent{
    width:100%;
    height:75px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    position:fixed;
    top:0;
    left:0;
    z-index:1000;
    background:rgba(255,255,255,0.15);
    backdrop-filter: blur(12px);
    box-shadow:0 3px 15px rgba(0,0,0,0.2);
}
.nav-left{ font-size:26px; font-weight:900; color:#ff5722; }
.nav-right{ display:flex; align-items:center; gap:20px; font-size:20px; cursor:pointer; }
.auth-buttons{ display:flex; gap:12px; }
.auth-buttons button{ padding:6px 14px; border-radius:8px; border:none; cursor:pointer; font-size:14px; font-weight:600; }
.login-btn{ background:white; border:1px solid #ccc; }
.signup-btn{ background:#ff5722; color:white; }

/* PAGE TITLE */
.page-title{
    text-align:center;
    font-size:32px;
    color:#e65c00;
    margin:20px 10px;
    text-shadow:0 2px 6px rgba(0,0,0,0.3);
}

/* GLASSY PLACE CARD */
.place-card{
    background: rgba(255,255,255,0.18); /* glass effect */
    backdrop-filter: blur(18px);
    border:1px solid rgba(255,255,255,0.25);
    border-radius:22px;
    margin:20px auto;
    padding:20px;
    width:90%;
    max-width:900px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    transition:0.35s;
}
.place-card:hover{
    transform:translateY(-8px) scale(1.02);
    background: rgba(255,255,255,0.25);
}

/* IMAGE — FIXED (No Cropping) */
.place-card img{
    width: 100%;
    height: auto;
    max-height: 400px;        /* adjustable */
    object-fit: contain;      /* show FULL picture */
    background: #fff;         /* fill empty area */
    border-radius: 18px;
    margin-bottom: 15px;
}

/* TITLE + RATING */
.place-card h2{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:20px;
    color:#e67300;
    margin-bottom:12px;
}

/* WISHLIST BUTTON */
.place-card form button{
    background:none;
    border:none;
    font-size:24px;
    cursor:pointer;
    transition: transform 0.2s;
}
.place-card form button:hover{ transform:scale(1.2); }

/* POINTS */
.place-card ul{
    margin-left:18px;
    color:#000;
    font-size:15px;
}
.place-card ul li{ margin-bottom:6px; }

/* FOOTER */
.footer{
    text-align:center;
    padding:25px;
    background:rgba(0,0,0,0.55);
    backdrop-filter:blur(12px);
    margin-top:60px;
    font-size:14px;
    color:white;
    box-shadow:0 -3px 15px rgba(0,0,0,0.2);
}

/* RESPONSIVE */
@media(max-width:768px){
    .place-card img{ max-height: 280px; }
    .page-title{ font-size:28px; }
    .place-card h2{ font-size:18px; }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="nav-transparent">
    <div class="nav-left">✈ Easy Go</div>
    <div class="nav-right">
        <div class="fab-option" onclick="window.location.href='wishlist.php'">
            <i class="fa-solid fa-heart"></i>
        </div>
        <i class="fa-solid fa-bell" title="Notifications"></i>
        <div class="auth-buttons">
<?php if(isset($_SESSION['user'])){ ?>
    
    <span>👋 <?php echo $_SESSION['user']['email']; ?></span>
    <button class="login-btn" onclick="window.location.href='logout.php'">Logout</button>

<?php } else { ?>

    <button class="login-btn" onclick="window.location.href='login.php'">Login</button>
    <button class="signup-btn" onclick="window.location.href='login.php?tab=signup'">Sign Up</button>

<?php } ?>
</div>
    </div>
</div>

<h1 class="page-title"><?= $country ?> – Popular Places</h1>

<?php foreach($data[$country] as $p): ?>
<div class="place-card">

    <!-- Wishlist -->
    <form method="POST" action="result.php" style="text-align:right;">
        <input type="hidden" name="toggle_wishlist" value="<?= $p['name'] ?>">
        <input type="hidden" name="country" value="<?= $country ?>">
        <button type="submit" title="Add to Wishlist">
            <?= in_array($p['name'], $_SESSION['wishlist']) ? '❤️' : '🤍' ?>
        </button>
    </form>

    <!-- Image -->
    <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>">

    <!-- Name + Rating -->
    <h2>
        <?= $p['name'] ?>
        <span>⭐ <?= $p['rating'] ?></span>
    </h2>
<ul>
<?php foreach($p['points'] as $pt): ?>
    <li><?= $pt ?></li>
<?php endforeach; ?>
</ul>

<?php if(isset($p['things_to_do'])): ?>
<div style="margin-top:15px;">
    <h4 style="margin-bottom:8px;">What You Can Do</h4>
    <ul>
        <?php foreach($p['things_to_do'] as $do): ?>
            <li><?= $do ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php if(isset($p['best_time'])): ?>
<div style="margin-top:10px; padding:10px; background:#f5f5f5; border-radius:8px;">
    <strong>Best Time to Visit:</strong> <?= $p['best_time'] ?>
</div>
<?php endif; ?>

<!-- VIEW HOTELS BUTTON -->
   <div style="margin-top:15px; display:flex; gap:12px; flex-wrap:wrap;">

<a href="hotel.php?country=<?= $country ?>&place=<?= $p['name'] ?>" 
   style="
        display:inline-block;
        padding:10px 18px;
        background:#ff5722;
        color:white;
        font-weight:600;
        border-radius:10px;
        text-decoration:none;
        transition:0.3s;
   "
   onmouseover="this.style.background='#e64a19'; this.style.transform='scale(1.05)';"
   onmouseout="this.style.background='#ff5722'; this.style.transform='scale(1)';"
>
    View Hotels
</a>

<a href="home.php?destination=<?= urlencode($country) ?>" 
   style="
        display:inline-block;
        padding:10px 18px;
        background:#ff5722;
        color:white;
        font-weight:600;
        border-radius:10px;
        text-decoration:none;
        transition:0.3s;
   "
   onmouseover="this.style.background='#e64a19'; this.style.transform='scale(1.05)';"
   onmouseout="this.style.background='#ff5722'; this.style.transform='scale(1)';"
>
    Search Flights
</a>

</div>

</div>
<?php endforeach; ?>

<!-- FOOTER -->
<div class="footer">
    © 2026 Easy Go. All Rights Reserved.
</div>

</body>
</html>
