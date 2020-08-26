<?php

$videoID = base64_decode($_GET["id"]);

?>
<style>
body{
    background-color: black;
}
</style>
<!-- Credit to: https://github.com/video-dev/hls.js/ and youngchiefbtw -->
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <video id="video" width="100%" height="100%"></video>
    <script>
      var video = document.getElementById("video");
      var videoSrc = "<?php echo $videoID; ?>";
      if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED, function() {
          video.play();
        });
      } else if (video.canPlayType("application/vnd.apple.mpegurl")) {
        video.src = videoSrc;
        video.addEventListener("loadedmetadata", function() {
          video.play();
        });
      }
    </script>
