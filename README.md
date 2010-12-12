lib_emplacify
--

(this document is incomplete)

Start here: [http://www.aaronland.info/weblog/2010/12/06/urmum/#enplacify](http://www.aaronland.info/weblog/2010/12/06/urmum/#enplacify)

lib_emplacify is *designed* to be used in conjuction with [flamework](https://github.com/exflickr/flamework) (as of this writing, specifically [my fork](https://github.com/straup/flamework)). While it probably doesn't need to be part of core flamework I've already found uses for it in two other projects that [hold hands](https://github.com/Citytracking/dotspotting/blob/master/README.FLAMEWORK.md) with flamework so now it's a little bundle of libraries and functions that I can check out and slot in where necessary.

If you don't want to bother using flamework I've included just enough real and mock flamework code so that this code will run on its own. Take a look at the `test.php` file for details.

Services that can be "enplacified":
--

* Chowhound

    http://www.chow.com/restaurants/919858/masala-cuisine

* Dopplr

    dplr.it/eat/qhk0

    dopplr:eat=qhk0

* Flickr

    http://www.flickr.com/photos/cynk/5084197983/

* Foodspotting

    http://www.foodspotting.com/places/1927

    foodspotting:place=1927

* foursquare

    foursquare:venue=1088273

* OpenStreetMap

    osm:node=357612309

    http://www.openstreetmap.org/browse/way/4799764

* Yelp

    http://www.yelp.com/biz/smitten-ice-cream-san-francisco

    http://www.yelp.com/biz/q20FkqFbmdOhfSEhaT5IHg

    yelp:biz=q20FkqFbmdOhfSEhaT5IHg

See also:
--

* [https://github.com/mncaudill/flickr-machinetag-geo](https://github.com/mncaudill/flickr-machinetag-geo)
