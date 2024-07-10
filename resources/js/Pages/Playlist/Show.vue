<template>
  <MusicLayout>
    <template #action>
      <div class="flex flex-row  mb-12 justify-between w-full">
        <h1 class="list-none text-4xl text-black font-bold">My playlist</h1>
        <div class=" w-1/3 gap-4 flex flex-row justify-end">
          <input placeholder="Search a track ..." v-model="filter" type="search" class=" w-10/12 rounded-lg text-md border border-gray-200 outline-none shadow-[0px_0px_34px_0px_rgba(139,92,246,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(139,92,246,0.1)] duration-500">
        </div>
      </div>
    </template>

    <template #content>
      <div>
        <h2 class="font-bold text-2xl w-full pb-4">All tracks</h2>
        <div class="grid grid-cols-2 gap-5">
          <Track v-for="track in filteredTracks" :key="track.uuid" :track="track" :active="currentTrack === track.uuid" @play="play"/>
        </div>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
  import Track from '@/Components/Track/Track.vue';
  import PlaylistExplore from '@/Components/Track/PlaylistExplore.vue';
  import { Link } from '@inertiajs/vue3';
  import TrackList from '@/Components/Track/TrackList.vue';


  export default {
    name: 'Index',

    components: {
      MusicLayout,
      Track,
      PlaylistExplore,
      TrackList,
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
        const url = "/storage/" + track.file;
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