<template>
  <div class="rounded-md shadow bg-white p-3 flex flex-row justify-between w-full mt-4 h-[17vh]">
    <div class="flex flex-row gap-5 relative w-full">
      <img class="w-[130px] h-fill object-cover rounded-md" :src="'storage/' + track.cover" alt="cover_album">
      <div class="flex flex-col justify-between w-full">
        <ul class="flex flex-col">
          <li class="list-none text-xl font-bold">{{ track.title }}</li>
          <li class="list-none flex flex-row items-center gap-2 text-xs text-gray-400"><img class="w-2 fill-gray-400 h-fit" src="storage/tracks/images/person.svg" alt="person-icon">{{ track.artist }}</li>
        </ul>
        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold px-6 py-1 rounded-md" @click="handleClick">Play</button>
      </div>
    </div>
    <div>
      <p class="text-xs text-gray-400">{{ track.play_count }}</p>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Track',

  emits: ['play'],

  props: {
    track: Object,
  },

  methods: {
    handleClick() {
      this.$emit('play', this.track);
      // const url = "storage/" + this.track.file;
      // console.log(url);

      // let audio = new Audio(url);
      // audio.play();
    }
  }
}

</script>
