<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router, usePage} from '@inertiajs/vue3';
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);

const toggleActivity = () => {
  router.post(`/users/activity/${user.value.id}`, {}, {
    onSuccess: (data) => {
      console.log(data)
    },
  });
};
</script>

<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Panel użytkownika
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 text-green-900" v-if="user.active">
            Jeżdże
          </div>
          <div class="p-6 text-red-900" v-else>
            Przerwa/Koniec
          </div>
          <button @click="toggleActivity" class="ml-6 mb-6 px-4 py-2 bg-blue-500 text-white rounded">
            Zmień status
          </button>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
