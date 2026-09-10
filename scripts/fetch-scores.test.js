// fetch-scores.test.js — unit tests for the Nakamoto computation (no network).
// Run: node --test scripts/fetch-scores.test.js
const test = require('node:test');
const assert = require('node:assert/strict');
const { nakamoto33 } = require('./fetch-scores');

test('reference distribution -> 2', () => {
  assert.equal(nakamoto33([20, 15, 12, 10, 9, 8, 7, 6, 5, 8]), 2);
});
test('equal split of 20 -> 7', () => {
  assert.equal(nakamoto33(new Array(20).fill(5)), 7);
});
test('single entity -> 1', () => {
  assert.equal(nakamoto33([100]), 1);
});
test('empty / junk -> null', () => {
  assert.equal(nakamoto33([]), null);
  assert.equal(nakamoto33([0, -3, NaN]), null);
});
test('concentrated pair -> 1', () => {
  assert.equal(nakamoto33([51, 49]), 1);
});
test('order-independent', () => {
  assert.equal(nakamoto33([5, 8, 20, 6, 15, 8, 9, 10, 7, 12]), 2);
});
