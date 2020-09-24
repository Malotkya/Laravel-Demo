# Laravel Demo

## Objective

1. Build a user interface using Laravel Views where it can accept only XML or CSV file(s) (choose which format you will allow) which will be in the same format/structure as the one provided to you. Your code should parse the contents of the file and update the database with the changes from the new file. Zip code will never change but associated data might so use that as the key for updates. If there is a new zip code entry it would have to be added to the database.

2. Build a user interface which allows searches using inputs for zip code, city and state. Preferably use drop down for the list of states. Search should return exact matches of locations using zip and city and state. If one of them is empty do not use that field as a search parameter.

3. Build a user interface that will have 3 inputs. 2 for zip codes and 1 for distance. You’ll use these inputs to query the API here http://www.zipcodeapi.com/API#matchClose and display the location details if there are matching results. For example: If you use 53703 and 53703 as the zip codes and 10 miles as the distance you’ll display all the information about both zip codes. Try the same with 53703 and 65221 and 10 miles and you’ll not display any information since they are not close to each other.
