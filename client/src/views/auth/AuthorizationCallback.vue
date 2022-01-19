<script setup lang="ts">
import PKCE from 'js-pkce';
import { useRouter } from 'vue-router';
import { injectAuth } from '../../store/useAuth';

const pkce = new PKCE({
  client_id: '1',
  redirect_uri: location.origin + '/auth/callback',
  token_endpoint: 'http://localhost/server/oauth/token',
});
const auth = injectAuth();
const router = useRouter();

pkce.exchangeForAccessToken(document.location.href).then((response) => {
  auth.setToken(response.access_token, response.refresh_token);
  // 認証後に遷移するページへ
  router.replace({ name: 'Home' });
});
</script>
