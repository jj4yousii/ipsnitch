<?php
include 'connect.php';

$query = "SELECT country, COUNT(*) as value FROM malicious_ips GROUP BY country";
$result = mysqli_query($con, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'id' => '',
        'name' => $row['country'],
        'value' => $row['value']
    );
}

$mapData = json_encode($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threat Map</title>
    <link rel="stylesheet" href="threatmap.css">

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>

<body>
    <div class="animated-boxes"></div>
    <header class="header">
        <img src="logo.png" class="logo" alt="Logo">
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="dash.php">Dashboard</a>
            <a href="threatmap.php">Threat map</a>
        </div>
        <div class="user-menu">
            <button class="user-button">
                <img src="user.png" alt="User Icon">
            </button>
            <div class="dropdown-content">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    <main>
        <h1>Threat Map with Live Location</h1>
        <div id="map"></div>
    </main>
    <footer class="footer">
        <span>21110125@htu.edu.jo</span> |
        <span>+962 7 9683 8808</span>
    </footer>

    <script>
        
        var mapData = <?php echo $mapData; ?>;

    
        var countryCodes = {
            "Afghanistan": "AF",
            "Albania": "AL",
            "Algeria": "DZ",
            "Andorra": "AD",
            "Angola": "AO",
            "Antigua and Barbuda": "AG",
            "Argentina": "AR",
            "Armenia": "AM",
            "Australia": "AU",
            "Austria": "AT",
            "Azerbaijan": "AZ",
            "Bahamas": "BS",
            "Bahrain": "BH",
            "Bangladesh": "BD",
            "Barbados": "BB",
            "Belarus": "BY",
            "Belgium": "BE",
            "Belize": "BZ",
            "Benin": "BJ",
            "Bhutan": "BT",
            "Bolivia": "BO",
            "Bosnia and Herzegovina": "BA",
            "Botswana": "BW",
            "Brazil": "BR",
            "Brunei": "BN",
            "Bulgaria": "BG",
            "Burkina Faso": "BF",
            "Burundi": "BI",
            "Cabo Verde": "CV",
            "Cambodia": "KH",
            "Cameroon": "CM",
            "Canada": "CA",
            "Central African Republic": "CF",
            "Chad": "TD",
            "Chile": "CL",
            "China": "CN",
            "Colombia": "CO",
            "Comoros": "KM",
            "Congo (Democratic Republic of the)": "CD",
            "Congo": "CG",
            "Costa Rica": "CR",
            "Côte divoire": "CI",
            "Croatia": "HR",
            "Cuba": "CU",
            "Cyprus": "CY",
            "Czech Republic": "CZ",
            "Denmark": "DK",
            "Djibouti": "DJ",
            "Dominica": "DM",
            "Dominican Republic": "DO",
            "Ecuador": "EC",
            "Egypt": "EG",
            "El Salvador": "SV",
            "Equatorial Guinea": "GQ",
            "Eritrea": "ER",
            "Estonia": "EE",
            "Eswatini": "SZ",
            "Ethiopia": "ET",
            "Fiji": "FJ",
            "Finland": "FI",
            "France": "FR",
            "Gabon": "GA",
            "Gambia": "GM",
            "Georgia": "GE",
            "Germany": "DE",
            "Ghana": "GH",
            "Greece": "GR",
            "Grenada": "GD",
            "Guatemala": "GT",
            "Guinea": "GN",
            "Guinea-Bissau": "GW",
            "Guyana": "GY",
            "Haiti": "HT",
            "Honduras": "HN",
            "Hungary": "HU",
            "Iceland": "IS",
            "India": "IN",
            "Indonesia": "ID",
            "Iran": "IR",
            "Iraq": "IQ",
            "Ireland": "IE",
            "Israel": "IL",
            "Italy": "IT",
            "Jamaica": "JM",
            "Japan": "JP",
            "Jordan": "JO",
            "Kazakhstan": "KZ",
            "Kenya": "KE",
            "Kiribati": "KI",
            "North Korea": "KP",
            "South Korea": "KR",
            "Kuwait": "KW",
            "Kyrgyzstan": "KG",
            "Laos": "LA",
            "Latvia": "LV",
            "Lebanon": "LB",
            "Lesotho": "LS",
            "Liberia": "LR",
            "Libya": "LY",
            "Liechtenstein": "LI",
            "Lithuania": "LT",
            "Luxembourg": "LU",
            "Madagascar": "MG",
            "Malawi": "MW",
            "Malaysia": "MY",
            "Maldives": "MV",
            "Mali": "ML",
            "Malta": "MT",
            "Marshall Islands": "MH",
            "Mauritania": "MR",
            "Mauritius": "MU",
            "Mexico": "MX",
            "Micronesia": "FM",
            "Moldova": "MD",
            "Monaco": "MC",
            "Mongolia": "MN",
            "Montenegro": "ME",
            "Morocco": "MA",
            "Mozambique": "MZ",
            "Myanmar": "MM",
            "Namibia": "NA",
            "Nauru": "NR",
            "Nepal": "NP",
            "Netherlands": "NL",
            "New Zealand": "NZ",
            "Nicaragua": "NI",
            "Niger": "NE",
            "Nigeria": "NG",
            "North Macedonia": "MK",
            "Norway": "NO",
            "Oman": "OM",
            "Pakistan": "PK",
            "Palau": "PW",
            "Panama": "PA",
            "Papua New Guinea": "PG",
            "Paraguay": "PY",
            "Peru": "PE",
            "Philippines": "PH",
            "Poland": "PL",
            "Portugal": "PT",
            "Qatar": "QA",
            "Romania": "RO",
            "Russia": "RU",
            "Rwanda": "RW",
            "Saint Kitts and Nevis": "KN",
            "Saint Lucia": "LC",
            "Saint Vincent and the Grenadines": "VC",
            "Samoa": "WS",
            "San Marino": "SM",
            "Sao Tome and Principe": "ST",
            "Saudi Arabia": "SA",
            "Senegal": "SN",
            "Serbia": "RS",
            "Seychelles": "SC",
            "Sierra Leone": "SL",
            "Singapore": "SG",
            "Slovakia": "SK",
            "Slovenia": "SI",
            "Solomon Islands": "SB",
            "Somalia": "SO",
            "South Africa": "ZA",
            "South Sudan": "SS",
            "Spain": "ES",
            "Sri Lanka": "LK",
            "Sudan": "SD",
            "Suriname": "SR",
            "Sweden": "SE",
            "Switzerland": "CH",
            "Syria": "SY",
            "Taiwan": "TW",
            "Tajikistan": "TJ",
            "Tanzania": "TZ",
            "Thailand": "TH",
            "Timor-Leste": "TL",
            "Togo": "TG",
            "Tonga": "TO",
            "Trinidad and Tobago": "TT",
            "Tunisia": "TN",
            "Turkey": "TR",
            "Turkmenistan": "TM",
            "Tuvalu": "TV",
            "Uganda": "UG",
            "Ukraine": "UA",
            "United Arab Emirates": "AE",
            "United Kingdom": "GB",
            "United States": "US",
            "Uruguay": "UY",
            "Uzbekistan": "UZ",
            "Vanuatu": "VU",
            "Vatican City": "VA",
            "Venezuela": "VE",
            "Vietnam": "VN",
            "Yemen": "YE",
            "Zambia": "ZM",
            "Zimbabwe": "ZW"
        };

        
        mapData.forEach(function(item) {
            item.id = countryCodes[item.name] || '';
        });

        const animatedBoxesContainer = document.querySelector('.animated-boxes');
        const boxCount = 2000;
        for (let i = 0; i < boxCount; i++) {
            const box = document.createElement('span');
            box.classList.add('animated-box');
            animatedBoxesContainer.appendChild(box);
        }

        var root = am5.Root.new("map");
        root.setThemes([am5themes_Animated.new(root)]);

        
        root.interfaceColors.set("background", am5.color(0x000033)); 

        var chart = root.container.children.push(am5map.MapChart.new(root, {}));

        var polygonSeries = chart.series.push(
            am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_worldLow,
                exclude: ["AQ"],
                fill: am5.color(0x004466), 
                stroke: am5.color(0x000033), 
            })
        );

        var bubbleSeries = chart.series.push(
            am5map.MapPointSeries.new(root, {
                valueField: "value",
                calculateAggregates: true,
                polygonIdField: "id"
            })
        );
        
        var circleTemplate = am5.Template.new({});

        bubbleSeries.bullets.push(function(root, series, dataItem) {
            var value = dataItem.dataContext.value;
            
            
            var radius = Math.sqrt(value) * 0.1;

            var container = am5.Container.new(root, {});

            var circle = container.children.push(
                am5.Circle.new(root, {
                    radius: radius,
                    fillOpacity: 0.7,
                    fill: am5.color(0xff0000), 
                    cursorOverStyle: "pointer",
                    tooltipText: `{name}: [bold]{value}[/]`
                }, circleTemplate)
            );

            var countryLabel = container.children.push(
                am5.Label.new(root, {
                    text: "{name}",
                    paddingLeft: 5,
                    populateText: true,
                    fontWeight: "bold",
                    fontSize: 13,
                    centerY: am5.p50,
                    visible: false
                })
            );

            container.events.on("click", function() {
                countryLabel.set("visible", true);
            });

            circle.on("radius", function(radius) {
                countryLabel.set("x", radius);
            });

            return am5.Bullet.new(root, {
                sprite: container,
                dynamic: true
            });
        });

        bubbleSeries.bullets.push(function(root, series, dataItem) {
            return am5.Bullet.new(root, {
                sprite: am5.Label.new(root, {
                    fill: am5.color(0xffffff),
                    populateText: true,
                    centerX: am5.p50,
                    centerY: am5.p50,
                    textAlign: "center"
                }),
                dynamic: true
            });
        });

        bubbleSeries.data.setAll(mapData);
    </script>

</body>

</html>
