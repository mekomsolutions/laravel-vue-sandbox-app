import { ref } from 'vue';

export const loadingProps = () => {
  const isLoading = ref(false);

  const loading = async (process: Function) => {
    isLoading.value = true;
    await process();
    isLoading.value = false;
  };

  return { isLoading, loading };
};
