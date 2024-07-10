<template>
    <MusicLayout> 
        <template #content>
          <div class="flex flex-row w-full rounded-2xl shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] gap-12 bg-white p-4 mt-10">
            <div class="flex flex-col w-1/2">
              <img class="w-full h-full object-cover bg-slate-200 rounded-xl min-h-[70vh]" src="/storage/tracks/images/illu.png" alt="illustration">
            </div>
            <div class="flex flex-col w-1/2 justify-center">
              <div class="flex flex-row  mb-6 justify-between w-full">
                <h1 class="list-none text-3xl font-bold"> Add a track </h1>
                <div class=" w-1/3 gap-4 flex flex-row justify-end">
                  <Link :href="route('tracks.create')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Back</Link>
                </div>
              </div>
              <div>
                <form @submit.prevent="submit" class="w-full flex flex-col gap-4">

                  <!-- Title & Artist -->
                  <div class="flex flex-row gap-4">
                    <!-- Title -->
                    <div class="flex flex-col gap-2 w-1/2">
                      <label for="title" class="font-bold">Title</label>
                      <input type="text" v-model="form.title" id="title" class="border border-gray-200 outline-none rounded-md" placeholder="Title" :class="{'border-red-500': form.errors.title}">
                      <p class="text-red-500 text-xs italic">{{form.errors.title}}</p>
                    </div>

                    <!-- Artist -->
                    <div class="flex flex-col gap-2 w-1/2">
                      <label for="artist" class="font-bold">Artist</label>
                      <input type="text" v-model="form.artist" id="artist" class="border border-gray-200 outline-none rounded-md" placeholder="Artist" :class="{'border-red-500': form.errors.artist}">
                      <p class="text-red-500 text-xs italic">{{form.errors.artist}}</p>
                    </div>
                  </div>
                  <!-- Display -->
                  <div class="flex flex-col gap-2">
                    <label for="display" class="font-bold">Display the track</label>
                    <select name="display" id="display"  v-model="form.display" class="border border-gray-200 outline-none rounded-md" :class="{'border-red-500': form.errors.display}">
                      <option :value="true">Yes</option>
                      <option :value="false">No</option>
                    </select>
                    <p class="text-red-500 text-xs italic">{{form.errors.display}}</p>
                  </div>

                  <!-- Cover -->
                  <div class="flex flex-col gap-2">
                    <label for="cover" class="font-bold">Choose a cover</label>
                    <input type="file" @input="form.cover = $event.target.files[0] " id="cover" class="border-none outline-none w-full">
                    <p class="text-red-500 text-xs italic">{{form.errors.cover}}</p>
                  </div>

                  <!-- File -->
                  <div class="flex flex-col gap-2">
                    <label for="file" class="font-bold">Choose an audio file</label>
                    <input type="file" @input="form.file = $event.target.files[0] " id="file" class="border-none outline-none w-full">
                    <p class="text-red-500 text-xs italic">{{form.errors.file}}</p>
                  </div>

                  <input type="submit" class="w-fit px-6 py-2 rounded-md font-bold transition-all duration-500 text-white shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(0,0,0,0.1)] hover:scale-[1.01]" value="Submit your track" :class="[form.processing ? 'bg-gray-500' : ' bg-violet-500 hover:bg-violet-600 active:bg-violet-700']" :disabled="form.processing">
                  
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
    name: 'Create',

    components: {
      MusicLayout,
    },

    data() {
      return {
        form: this.$inertia.form( {
          title: '',
          artist: '',
          cover: null,
          file: null,
          display: true,
        })
      }
    },

    methods: {
      submit() {
        console.log('submit');
        this.form.post(route('tracks.store'), {
          onSuccess: () => {
            this.form.reset();
          }
        });
      }
    }
  }
</script>