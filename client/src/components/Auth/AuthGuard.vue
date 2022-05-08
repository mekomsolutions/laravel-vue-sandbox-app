<script setup lang="ts">
import PKCE from 'js-pkce';
import { injectAuth } from '../../store/authContext';

const { hasToken } = injectAuth();
const baseApiUrl = import.meta.env.VITE_BASE_API_URL

if (!hasToken()) {
  const pkce = new PKCE({
    client_id: '1',
    redirect_uri: location.origin + '/auth/callback',
    authorization_endpoint: `${baseApiUrl}/oauth/authorize`,
    requested_scopes: '*',
  });
  location.replace(pkce.authorizeUrl());
}
</script>

<template v-if="hasToken()">
  <slot />
</template>
