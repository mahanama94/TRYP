
<!-- MAP LEVEL SCRIPTS -->

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq_NEt8jDcWVHVGkYVEFS9WA0Y7TGCcOc&callback=initMap" async defer></script>
<script src="<?php echo Assets::getPublic('/assets/plugins/gmaps/gmaps.js')?>"></script>
<script src="<?php echo Assets::getPublic('/assets/js/mapsInit.js')?>"></script>
<script>
            $(function () { MapsInit(); });
</script>

<!-- /MAP LEVEL SCRIPTS -->