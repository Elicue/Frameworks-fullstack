<template>
  <MusicLayout>
    <template #content>
      <div class="flex flex-row w-full rounded-2xl border border-gray-200 gap-12 bg-white p-4">
        <div class="flex flex-col w-full justify-center">
          <div class="flex flex-row  mb-6 justify-between w-full">
            <h1 class="list-none text-3xl font-bold"> Add a key </h1>
            <div class=" w-1/3 gap-4 flex flex-row justify-end">
              <Link :href="route('api-keys.index')" class="w-fit bg-violet-500 hover:bg-violet-600 active:bg-violet-700 px-6 py-2 rounded-md font-bold shadow text-white">Back</Link>
            </div>
          </div>
          <div>
            <form @submit.prevent="submit" class="w-full flex flex-col gap-4">
              <!-- Name -->
              <div class="flex flex-col gap-2 w-1/2">
                <label for="name" class="font-bold">Name</label>
                <input type="text" v-model="form.name" id="name" class="border border-gray-200 outline-none rounded-md" placeholder="Name" :class="{'border-red-500': form.errors.name}">
                <p class="text-red-500 text-xs italic">{{form.errors.name}}</p>
              </div>

              <input type="submit" class="w-fit px-6 mt-6 py-2 rounded-md font-bold transition-all duration-500 text-white shadow-[0px_0px_34px_0px_rgba(0,0,0,0.08)] hover:shadow-[0px_0px_34px_0px_rgba(0,0,0,0.1)] hover:scale-[1.01]" value="Create your key" :class="[form.processing ? 'bg-gray-500' : ' bg-violet-500 hover:bg-violet-600 active:bg-violet-700']" :disabled="form.processing">
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
        form: this.$inertia.form({
          name: '',
        }),
      }
    },

    methods: {
      submit() {
        console.log('submit');
        this.form.post(route('api-keys.store'), {
          onSuccess: () => {
            this.form.reset();
          }
        });
      }
    },

  }
</script>