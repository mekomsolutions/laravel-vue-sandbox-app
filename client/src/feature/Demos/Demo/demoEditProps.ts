import { ElForm, ElMessage } from 'element-plus';
import { onBeforeMount, reactive, ref } from 'vue';
import { injectAuth } from '../../../store/authContext';
import { Demo } from './demo';
import { DemoRepository } from './demoRepository';
import { loadingProps } from './loadingProps';

export const demoEditProps = () => {
  const demoForm = ref<InstanceType<typeof ElForm>>();
  const demo = reactive(new Demo());
  const demoRepository = new DemoRepository(injectAuth());
  const { isLoading, loading } = loadingProps();

  // load
  onBeforeMount(async () => {
    loading(async () => {
      const response = await demoRepository.find();
      Object.assign(demo, response.data);
    });
  });

  const save = async () => {
    demoForm.value?.validate((valid) => {
      if (!valid) return;
      loading(async () => {
        const response = await demoRepository.upsert(demo);
        demo.id = response.data.id;
        ElMessage({ message: 'Saved', type: 'success' });
      });
    });
  };

  return { demoForm, demo, isLoading, save };
};
