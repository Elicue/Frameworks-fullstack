<template>
  <MusicLayout>
    <template #content>
      <div>
        <h1>My Tracks</h1>
        <ul>
          <li v-for="track in tracks" :key="track.id">
            <p>Title : {{ track.title }}</p>
            <p>Artist : {{ track.artist }}</p>
          </li>
        </ul>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';

  export default {
    name: 'Index',

    components: {
      MusicLayout,
    },

    props: {
      tracks: Array,
    }
  }
</script>