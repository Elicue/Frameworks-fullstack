<template>
  <MusicLayout>
    <template #content>
      <div class="flex flex-row w-full rounded-2xl border border-gray-200 gap-12 bg-white p-4">
        <div class="flex flex-col w-full justify-center">
          <div class="flex flex-row  mb-6 justify-between w-full">
            <h1 class="list-none text-3xl font-bold"> Modifier la playlist {{ playlist.title }} </h1>
            <div class=" w-1/3 gap-4 flex flex-row justify-end">
              <Link :href="route('playlists.index')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Back</Link>
            </div>
          </div>
          <div>
            <form @submit.prevent="submit" class="w-full flex flex-col gap-4">
              <!-- Title -->
              <div class="flex flex-col gap-2 w-1/2">
                <label for="title" class="font-bold">Title</label>
                <input type="text" v-model="form.title" id="title" class="border border-gray-200 outline-none rounded-md" placeholder="Title" :class="{'border-red-500': form.errors.title}">
                <p class="text-red-500 text-xs italic">{{form.errors.title}}</p>
              </div>

              <div class="grid grid-cols-3 gap-4 w-full max-h-[50vh] pr-4 overflow-y-scroll pb-12 shadow-[inset_-10px_-10px_20px_0px_rgba(139,92,246,0.1)] rounded-lg">
                <div class="flex flex-row gap-4 border border-gray-200 rounded-md p-4 w-full" v-for="track in tracks" :key="track.uuid">
                  <input class="mt-2" type="checkbox" name="tracks" :id="track.uuid" v-model="form.tracks" :value="track.uuid">
                  <div class="flex flex-col">
                    <label class="text-lg" :for="track.uuid">{{ track.title }}</label>
                    <label class="text-gray-400 text-base" :for="track.uuid">{{ track.artist }}</label>
                  </div>
                  <p class="text-red-500 text-xs italic">{{form.errors.tracks}}</p>
                </div>
              </div>

              <input type="submit" class="w-fit px-6 mt-6 py-2 rounded-md font-bold transition-all duration-500 text-white shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(0,0,0,0.1)] hover:scale-[1.01]" value="Edit your playlist" :class="[form.processing ? 'bg-gray-500' : ' bg-violet-500 hover:bg-violet-600 active:bg-violet-700']" :disabled="form.processing">

            </form>
          </div>
        </div>
      </div>
    </template>
  </MusicLayout>
</template>

<script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';

  export default {
    name: 'Edit',

    data() {
      return {
        form: this.$inertia.form({
          title: this.playlist.title,
          tracks: this.playlist.tracks.map(track => track.uuid),
        }),
      }
    },

    props : {
      tracks: Array,
      playlist: Object,
    },

    methods: {
      submit() {
        this.form.put(route('playlists.update', {playlist: this.playlist.uuid}));
      }
    },

    components: {
      MusicLayout,
    },

  }
</script>