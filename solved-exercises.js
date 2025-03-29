// 1
function pickPropArray(array, property) {
    let result = [];
    for (let i = 0; i < array.length; i++) {
        if (array[i][property] !== undefined)
            result.push(array[i][property]);
    }
    return result; 
}

// 2
function createCounter() {
  let count = 0;

  return function () {
    count++;
    return count;
  }
}

// 3
function spinWords(str) {
    let words = str.split(" ");
    let result = [];
    for (let i = 0; i < words.length; i++) {
        if (words[i].length >= 5) 
            result.push(words[i].split("").reverse().join(""));
        else 
            result.push(words[i]);
    }
    return result.join(" ");
}

// 4
function getIndexes(nums, target) {  
    for (let i = 0; i < nums.length; i++) {
        for (let j = 0; i < nums.length; j++)
            if (nums[i] + nums[j] == target)
                return [i, j]
    }
}

// 5
function getLongString(strs) {
    let prefix = strs[0];

    while (prefix.length >= 2) {
        let found = true;

        for (let i = 1; i < strs.length; i++) {
            if (!strs[i].includes(prefix)) {
                prefix = prefix.substring(1);
                found = false;
                break;
            }
        }

        if (found) 
            break;
    }

    return prefix.length >= 2 ? prefix : "";
}