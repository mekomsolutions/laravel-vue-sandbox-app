<script setup lang="ts">
import PKCE from 'js-pkce';
import { useRouter } from 'vue-router';
import { injectAuth } from '../../store/authContext';

const pkce = new PKCE({
  client_id: '1',
  redirect_uri: location.origin + '/auth/callback',
  token_endpoint: 'http://localhost/server/oauth/token',
});
const { setTokens } = injectAuth();
const router = useRouter();

pkce.exchangeForAccessToken(document.location.href).then((response) => {
  setTokens(response.access_token, response.refresh_token);
  // Redirect after auth
  router.replace({ name: 'Home' });
});
</script>

<template></template>
