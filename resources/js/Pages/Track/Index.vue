<template>
  <MusicLayout>
    <template #content>
      <div>
        <h1 class="list-none text-xl font-bold">My Tracks</h1>
        <!-- <ul v-for="track in tracks" :key="track.uuid">
          <Track/>
        </ul> -->
        <div class="grid grid-cols-2 gap-5">
          <Track v-for="track in tracks" :key="track.uuid" :track="track" @play="play"/>
        </div>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import Track from '@/Components/Track/Track.vue';


  export default {
    name: 'Index',

    components: {
      MusicLayout,
      Track,
    },

    props: {
      tracks: Array,
    },

    data() {
      return {
        audio: null,
        currentTrack: null,
      }
    },

    methods: {
      play(track) {
        const url = "storage/" + track.file;
        console.log(url);

        if (!this.currentTrack) {
          this.audio = new Audio(url);
          this.audio.play();
        }else if (this.currentTrack !== track.uuid) {
          this.audio.pause();
          this.audio.src = url;
          this.audio.play();
        }else {
          this.audio.paused ? this.audio.play() : this.audio.pause();
        }

        this.currentTrack = track.uuid;
        this.audio.addEventListener('ended', () => {
          this.currentTrack = null;
        });
      
      }
    }
  }
</script>