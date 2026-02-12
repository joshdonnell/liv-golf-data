<script setup lang="ts">
import type { HTMLAttributes } from 'vue'

defineOptions({
  inheritAttrs: false,
})

type Props = {
  className?: HTMLAttributes['class']
}

defineProps<Props>()
</script>

<template>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 48 64"
    width="31.5"
    height="42"
  >
    <path
      fill="#000"
      d="m17.597 58.431 3.79 4.69h19.387c1.26 0 2.25-.9 2.52-2.07l.54-2.62H22.356l.63-2.8h21.366c.36-1.44.72-3.069.99-4.599H23.896l.63-2.8h21.457c.27-1.53.63-3.069.99-4.689H25.516l.54-2.71h21.457l.36-1.709c.36-1.53-.81-2.89-2.43-2.89H27.046L34.085 2.98c.36-1.71-.81-2.98-2.43-2.98h-1.71L17.597 58.421zm-5.949-7.569 3.79 4.78L27.226 0h-4.87L11.629 50.852zM5.7 43.293l3.88 4.87L19.747 0h-4.87L5.68 43.283zM0 36.065l3.7 4.689L12.167 0h-1.98c-1.62 0-2.98.99-3.339 2.71z"
    />
  </svg>
</template>
