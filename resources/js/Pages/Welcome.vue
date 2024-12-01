<script setup>
import {MapIcon, PhoneIcon} from '@heroicons/vue/24/outline'
import ParagraphWithTitle from "@/Pages/ParagraphWithTitle.vue";
import {usePage} from "@inertiajs/vue3";
import {computed, onMounted} from "vue";
import {getUserLocalization} from "@/helpers.js";

const props = defineProps(['users'])

const page = usePage();
const user = computed(() => page.props.auth.user);

onMounted(() => {
  if (user.value) {
    console.log('user', user.value);
    setInterval(() => {
      getUserLocalization();
    }, 3 * 60 * 1000);
  }

});
</script>

<template>
  <header class="p-5 flex flex-row items-center border-b" style="border-bottom: 1px solid white;">
    <img src="/images/delfin.png" width="60" alt="Logo Delfin">
    <h1 class="text-center text-4xl w-full">DELFIN MELEX</h1>
  </header>
  <main class="px-5 h-full">
    <ParagraphWithTitle
      title=""
      content="Zapraszamy do skorzystania z naszych usług na terenie Stegny oraz całej Mierzei wiślanej. <br/><br/> Skontaktuj się z jednym z naszych aktywnych kierowców i zamów przejazd."
      id=""
    />
    <section id="kierowcy">
      <h2 class="text-3xl my-5">Kierowcy</h2>
      <ul>
        <li class="item" :class="user.active ? 'active' : 'inactive'" v-for="user in props.users.data" :key="user.id">
          <p class="text-xl">
            {{ user.name }}
            <a v-if="user.active" href="tel:123456789">
              <PhoneIcon class="h-6 w-6 inline mx-2"/>
            </a>
            <span v-if="user.active"><MapIcon class="h-6 w-6 inline mx-2"/></span>
          </p>

        </li>
      </ul>
    </section>
    <section id="mapa">
      <h2 class="text-3xl my-5">Mapa</h2>

      <div id="map"></div>
    </section>
  </main>
  <footer class="border-t p-5 flex flex-row text-xl" style="border-top: 1px solid white">
    <div>
      <p class="mb-2">Kontakt</p>
      <ul>
        <li>Rafał: <a href="tel:123456789">+48 123456789</a></li>
        <li>Damian: <a href="tel:123456789">+48 123456789</a></li>
      </ul>
      <p class="mt-4 text-xs text-lightgray"> Stworzone i zaprojektowane przez <a
        href="https://www.linkedin.com/in/lukasz-cysewskl/">Łukasza
        Cysewskiego</a></p>
    </div>
  </footer>
</template>

<style>
.item p::before {
  display: inline-block;
  width: 16px;
  height: 16px;
  content: ' ';
  border-radius: 50%;
  margin-right: 10px;
}

.active p::before {
  background-color: #5DFF1A;
}

.inactive p::before {
  background-color: #FF1A1A;
}

</style>
