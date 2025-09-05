/** @type {import('stylelint').Config} */
export default {
  extends: [
    'stylelint-config-standard-scss',
    'stylelint-config-recess-order',
    'stylelint-config-prettier-scss',
  ],
  rules: {
    'scss/dollar-variable-pattern': '^[$]?[a-z]+([A-Z][a-z0-9]+)*$',
    'selector-class-pattern':
      '^[a-z0-9]+(-[a-z0-9]+)*(__[a-z0-9]+(-[a-z0-9]+)*)?(--[a-z0-9]+(-[a-z0-9]+)*)?$',
  },
};
