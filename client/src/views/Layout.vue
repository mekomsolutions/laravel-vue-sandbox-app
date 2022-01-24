<script setup lang="ts">
import AuthGuardVue from '../components/Auth/AuthGuard.vue';
</script>

<template>
  <AuthGuardVue>
    <el-container>
      <el-aside width="200px">
        <el-menu router>
          <el-menu-item index="/">Home</el-menu-item>
          <el-menu-item index="/about">About</el-menu-item>
          <el-menu-item index="/demos/demo">Demo</el-menu-item>
        </el-menu>
      </el-aside>
      <el-container>
        <el-header></el-header>
        <el-main>
          <router-view />
        </el-main>
      </el-container>
    </el-container>
  </AuthGuardVue>
</template>
