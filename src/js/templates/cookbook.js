import List from 'list.js';
import { $$ } from '../utils/selector';

var options = {
  valueNames: [
    { name: "cookbook-category", attr: "data-category" },
    "cookbook-title",
    "cookbook-description"
  ]
};

const recipes = new List('cookbook-recipes', options);

let current = [];

$$(".cookbook-categories li").forEach(filter => {
  filter.addEventListener("click", () => {
    if (current.includes(filter.dataset.category)) {
      current = current.filter(x => x !== filter.dataset.category);
      filter.classList.remove("current");
    } else {
      current.push(filter.dataset.category);
      filter.classList.add("current");
    }
    recipes.filter(item => {
      if (current.length === 0) {
        return true;
      }
      return current.some(x => item.values()["cookbook-category"].split(', ').includes(x));
    });
    return false;
  })
});
