$(document).ready(function(){
    $(".search_for_friends").keyup(function(){
        var name=$(".search_for_friends").val();
        $.post("AddAndFind.php", {
            suggest:name
        },
        function(data) {
            if (name.length!==0) {
                $("#people").html(data);
                $("#people").attr("hidden",false);
            }
            else{
                $("#people").attr("hidden",true);
            }
        });
    });
    $(".Accept").click(function(){
        var newFriend=$(".reqSenderName").text();
        $.post("AddAndFind.php", {
            newRequest:newFriend
        });
    });
    $(".Refuse").click(function(){
        var declinedContact=$(".reqSenderName").text();
        $.post("AddAndFind.php",{
            refused: declinedContact
        });
    });
    
    document.querySelector("#FileUpload1").addEventListener('change', function(){
        var choosedFile2= this.files[0];
        if (choosedFile2){
            var reader=new FileReader();
            reader.addEventListener('load', function(){
                document.querySelector('#chatIMG').value=reader.result;
            });
            reader.readAsDataURL(choosedFile2);
        }
    });
    $(".btn_search").click(function(){
        let chaine=document.querySelector(".search_for_friends").value;
        sessionStorage.setItem("sea",chaine);
        window.location.href="sendingSearching.html";
    });
    
    $(".btn_chat").click(function(){
        var intendedUser=$(".person_name").text();
        var message=$(".texting").val();
        var image=$("#chatIMG").val();
        $("#chatIMG").val("");
        $(".texting").val("");
        $.post("insertmsg.php",{
            msg:message,
            img:image,
            toUser:intendedUser
        });
        $(".ms1").stop().animate({scrollTop:$(".ms1")[0].scrollHeight},1000);
    });
    $.post("getContactList.php",
    function(data){
        $("#contactList").html(data);
    });
    

    document.querySelector(".ms1").addEventListener("scroll",function(){
        var maxScroll=$(".ms1")[0].scrollHeight;
        var verticalScroll=$(".ms1").scrollTop();
        var difference=1.2648648648648648;
        if((verticalScroll*difference)<maxScroll-400){
            document.querySelector(".ifNewMessage").setAttribute("style","z-index:1;margin-top:-35px;transition: 0.2s;opacity:1;");
        }
        else{
            document.querySelector(".ifNewMessage").setAttribute("style","margin-top:5px;transition: 0.2s;opacity:0;z-index:-1;");
        }
    });
    $(".ifNewMessage").click(function(){
        $(".ms1").stop().animate({ scrollTop: $(".ms1")[0].scrollHeight}, 1000);
    });
    setInterval(function(){
        if(document.querySelector(".person_name").textContent!==''){
            var me=$("#li2").text();
            var fromintended=$(".person_name").text();
            $.post("getmsg.php",{
                fromUserMe:me,
                toUserHim:fromintended 
            },
            function(info){
                $(".ms1").html(info);
            });
        }
    },500);
    $("#blocked").click(function(){
        var contact=$(".person_name").text();
        $(".blocking").attr("hidden",true);
        $.post("AddAndFind.php",{
            ct: contact
        });
    });
    const online="on";
    const offline="off";

    $(window).on("beforeunload",function(){
        $.post("OnOffLine.php",{
            detecting:offline
        });
    });
    if (navigator.onLine===true) {
        $.post("OnOffLine.php",{
            detecting:online
        });
    }
    $(function () {
        var playerTrack = $("#player-track"),
        bgArtwork = $("#bg-artwork"),
        bgArtworkUrl,
        albumName = $("#album-name"),
        trackName = $("#track-name"),
        albumArt = $("#album-art"),
        seekBar = $("#seek-bar"),
        trackTime = $("#track-time"),
        playPauseButton = $("#play-pause-button"),
        img = $("#fas-play"),
        tProgress = $("#current-time"),
        tTime = $("#track-length"),
        bTime,
        nTime = 0,
        buffInterval = null,
        albums = [
        "Dawn",
        "Me & You",
        "Electro Boy",
        "Home",
        "Proxy (Original Mix)"
        ],
        trackNames = [
            "Skylike - Dawn",
            "Alex Skrindo - Me & You",
            "Kaaze - Electro Boy",
            "Jordan Schor - Home",
            "Martin Garrix - Proxy"
        ],
        albumArtworks = ["_1", "_2", "_3", "_4", "_5"],
        trackUrl = [
            "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3",
            "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/1.mp3",
            "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/3.mp3",
            "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/4.mp3",
            "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/5.mp3"
        ],
        currIndex = -1;
        function playPause() {
            setTimeout(function () {
                if (audio.paused) {
                    albumArt.addClass("active");
                    checkBuffering();
                    img.attr("src", "pause-solid.svg");
                    audio.play();
                } else {
                    albumArt.removeClass("active");
                    clearInterval(buffInterval);
                    img.attr("src", "play-solid.svg");
                    audio.pause();
                }
            }, 50);
        }
        function checkBuffering() {
            clearInterval(buffInterval);
            buffInterval = setInterval(function () {
                if (nTime == 0 || bTime - nTime > 1000) albumArt.addClass("buffering");
                else albumArt.removeClass("buffering");
                bTime = new Date();
                bTime = bTime.getTime();
            }, 100);
        }
      
        function selectTrack(flag) {
            if (flag == 0 || flag == 1) ++currIndex;
            else --currIndex;
            if (currIndex > -1 && currIndex < albumArtworks.length) {
                if (flag == 0) img.attr("src", "play-solid.svg");
                else {
                    albumArt.removeClass("buffering");
                    img.attr("src", "pause-solid.svg");
                }
                seekBar.width(0);
                trackTime.removeClass("active");
                tProgress.text("00:00");
                tTime.text("00:00");
                currAlbum = albums[currIndex];
                currTrackName = trackNames[currIndex];
                currArtwork = albumArtworks[currIndex];
                audio.src = trackUrl[currIndex];
                nTime = 0;
                bTime = new Date();
                bTime = bTime.getTime();
                if (flag != 0) {
                    audio.play();
                    playerTrack.addClass("active");
                    albumArt.addClass("active");
                    clearInterval(buffInterval);
                    checkBuffering();
                }
                albumName.text(currAlbum);
                trackName.text(currTrackName);
                albumArt.find("img.active").removeClass("active");
                $("#" + currArtwork).addClass("active");
                bgArtworkUrl = $("#" + currArtwork).attr("src");
                bgArtwork.css({ "background-image": "url(" + bgArtworkUrl + ")" });
            } else {
                if (flag == 0 || flag == 1) --currIndex;
                else ++currIndex;
            }
        }
        function initPlayer() {
            audio = new Audio();
            selectTrack(0);
            audio.loop = false;
            playPauseButton.on("click", playPause);
        }
        initPlayer();
    });
});
