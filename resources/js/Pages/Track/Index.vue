<template>
  <MusicLayout>
    <template #action>
      <div class="flex flex-row  mb-6 justify-between w-full">
        <h1 class="list-none text-3xl font-bold text-white"> Trending right now</h1>
        <div class=" w-1/3 gap-4 flex flex-row justify-end">
          <input placeholder="Search ..." v-model="filter" type="search" class=" w-10/12 rounded-lg text-md shadow border-none outline-none">
          <Link :href="route('tracks.create')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Add</Link>
        </div>
      </div>
    </template>
    <template #content>
      <div>
        <div class="grid grid-cols-2 gap-5">
          <Track v-for="track in filteredTracks" :key="track.uuid" :track="track" @play="play"/>
        </div>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import Track from '@/Components/Track/Track.vue';
  import { Link } from '@inertiajs/vue3'


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
        filter: '',
      }
    },

    computed: {
      filteredTracks() {
        return this.tracks.filter(track => track.title.toLowerCase().includes(this.filter.toLowerCase()) || track.artist.toLowerCase().includes(this.filter.toLowerCase()));
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
          //fais en sorte que l'image du boutton change en fonction de l'état ( play/pause)

        }

        this.currentTrack = track.uuid;
        this.audio.addEventListener('ended', () => {
          this.currentTrack = null;
        });
      
      }
    }
  }
</script>