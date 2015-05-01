<?php
interface Interface_WeatherForecastRegisterable{

    // alle functies in een interface zijn public. Ander zou het niet een hele geweldige interface zijn ;-)
    // Elke functie is eigenlijk een abstracte functie omdat ie alleen wordt gedefinieerd. Hij doet verder niks. (Design, but zero implementation details).
    // Dit kan handig zijn voor naamconventies alser bijvoorbeeld meerdere mensen aan een project programmeren.
    // Verder dwing je zo af om deze functies verplicht te laten gebruiken door een class die deze interface implementeert.
    // Er bestaan geen properties. Wel constanten. Kan dus handig zijn om al je constanten in een class te gooien.
    // 2 manieren om deze constanten aan te roepen. Enerzijds Classname::CONSTANTE en anderzijds Self::CONSTANTE.
    // Indien een class deze functies van een interface implementeert, echter een class in een hogere hierarchie
    // waarvan de huidige class deze extend,bevat al zo'n functienaam, dan geldt het volgende:
    // Je hoeft deze functie dan niet meer te implementeren. Doe je dit wel dan override je de functie van de hogere hierarchie.
    // Het mooie van een interface: Een class kan maar 1 class extenden, maar meerdere interfaces implementeren.

    public function notify($weather);

}