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

    methods: {
      play(track) {
      const url = "storage/" + track.file;
      console.log(url);

      let audio = new Audio(url);
      audio.play();
      }
    }
  }
</script>