lib_emplacify
--

HEY LOOK! THIS ISN'T QUITE DONE YET!! REALLY. THERE ARE STILL BUGS.

Start here: [http://www.aaronland.info/weblog/2010/12/06/urmum/#enplacify](http://www.aaronland.info/weblog/2010/12/06/urmum/#enplacify)

lib_emplacify is *designed* to be used in conjuction with [flamework](https://github.com/straup/flamework) (as of this writing, specifically my fork). While it probably doesn't need to be part of core flamework I've already found uses for it in two other projects that [hold hands](https://github.com/Citytracking/dotspotting/blob/master/README.FLAMEWORK.md) with flamework so now it's a little bundle of libraries and functions that I can check out and slot in where necessary.

If you don't want to bother using flamework I've included just enough real and mock flamework code so that this code will run on its own. Take a look at the `test.php` file for details.

To do:
--

* Fix outstanding bugs

* Move the caching out of lib_enplacify and back in to the service specific libraries

See also:
--

* [https://github.com/mncaudill/flickr-machinetag-geo](https://github.com/mncaudill/flickr-machinetag-geo)
