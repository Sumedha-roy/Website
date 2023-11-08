let previous =document.querySelector('#pre');
let play =document.querySelector('#play');
let next =document.querySelector('#next');
let tittle =document.querySelector('#title');
let recent_volume =document.querySelector('#volume');
let volume_show =document.querySelector('#volume_show');
let slider =document.querySelector('#duration_slider');
let show_duration =document.querySelector('#show_duration');
let track_image =document.querySelector('#track_image');
let present =document.querySelector('#auto');
let total =document.querySelector('#total');
let artist =document.querySelector('#artist');

let timer;
let autoplay=0;
let index_no=0;
let playing_song= false;
let track = document.createElement('audio');
let All_song=[
    {
        name:"Patola",
        path:"songs/guru/Patola - Blackmail 320 Kbps.mp3",
        img: "images/guru/118038-patola-guru-randhawa-bohemia-mp3-song-300.jpg",
        singer:"Guru Randhawa"
    },
    {
        name:"Dekhi Rupsagorer",
        path:"songs/guru/Lagdi Lahore Di - Street Dancer 3D 320 Kbps.mp3",
        img: "images/guru/thumb-lahore-guru-randhawa-mp3-song-download111-300.jpg",
        singer:"Guru Randhawa"
    },
    {
        name:"Upama's Song",
        path:"songs/guru/Ban Ja Rani - Tumhari Sulu 320 Kbps.mp3",
        img: "images/guru/thumb-tumhari-sulu-2018-mp3-songs-300.jpg",
        singer:"Guru Randhawa"
    }
];
function load_track(index_no){
    reset_slider();
    clearInterval(timer);
    track.src=All_song[index_no].path;
    tittle.innerHTML=All_song[index_no].name;
    track_image.src=All_song[index_no].img;
    artist.innerHTML=All_song[index_no].singer;
    track.load();

    total.innerHTML = All_song.length;
    present.innerHTML = index_no + 1;
    
    timer = setInterval(range_slider , 1000);
}
load_track(index_no);
function reset_slider(){
    slider.value = 0;
}
function mute_sound(){
    track.volume=0;
    volume.value=0;
    volume_show.innerHTML =0;
}
function justplay(){
    if(playing_song== false){
        playsong();
    }
    else{
        pausesong();
    }
}
function playsong(){
    track.play();
    playing_song =true;
    play.innerHTML= '<i class="fa fa-pause" aria-hidden="true"></i>';

}
function pausesong(){
    track.pause();
    playing_song = false;
    play.innerHTML ='<i class="fa fa-play" aria-hidden="true"></i>';
}
function next_song(){
    if(index_no < All_song.length -1){
        index_no +=1;
        load_track(index_no);
        playsong();
    }else{
        index_no=0;
        load_track(index_no);
        playsong();
    }
}
function previous_song(){
    if (index_no > 0){
        index_no -=1;
        load_track(index_no);
        playsong();
    }else{
        index_no=All_song.length;
        load_track(index_no);
        playsong();
    }
}
function volume_change(){
    volume_show.innerHTML = recent_volume.value;
    track.volume = recent_volume.value / 100;
}
function change_duration(){
    slider_position = track.duration * (slider.value / 100);
    track.currentTime = slider_position;
}
function range_slider(){
    let position =0;


    if(!isNaN(track.duration)){
        position = track.currentTime * (100 / track.duration);
        slider.value = position;
    }
}
if(track.ended){
    play.innerHTML ='<i class="fa fa-play" aria-hidden="true"></i>';
    if(autoplay==1){
        index_no +=1;
        load_track(index_no);
        playsong();

    }
    
}