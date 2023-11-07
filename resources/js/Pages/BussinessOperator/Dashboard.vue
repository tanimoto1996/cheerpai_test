<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

const logout = () => {
  router.post(route("bussiness-operator.logout"));
};
</script>

<template>
  <Head title="Admin Dashboard" />

  <div>
    <p>This is an bussiness-operator dashboard page!</p>
    <button @click="logout">Logout</button>
  </div>
</template>
