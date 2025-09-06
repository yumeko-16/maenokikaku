/** @type {import('stylelint').Config} */
export default {
  extends: [
    'stylelint-config-standard-scss',
    'stylelint-config-recess-order',
    'stylelint-config-prettier-scss',
  ],
  rules: {
    'selector-id-pattern': '^[a-z][a-zA-Z0-9]*$',
    'selector-class-pattern':
      '^[a-z]+([A-Z][a-z0-9]+)*(__[a-z]+([A-Z][a-z0-9]+)*)?(--[a-z]+([A-Z][a-z0-9]+)*)?$',
  },
};
