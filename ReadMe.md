|--------------------------------------------- DATA EXTRACTION -----------------------------------------------|

The original dataset is stored in the following link: https://evasharma.github.io/bigpatent/

|--------------------------------------------- DATA PREPROCESSING -----------------------------------------------|

1. The user unzips the downloaded file.
2. The user runs the 'create-csv.ipynb' file to convert all the zipped json files to a dataframe format and save it to a csv file called 'initial_dataset.csv'

|--------------------------------------------- SUMMARIZATION AND RECOMMENDATION PROCESS -----------------------------------------------|

3. The user loads the 'initial_dataset.csv' and 'contractions.pkl' files in the 'Custom_Text_Summarization.ipynb' notebook to run the custom text summarization model.
4. The user loads the 'initial_dataset.csv' in the 'Pretrained_Text_Summarization.ipynb' notebook to run the Facebook Bart Large model and produce text summaries. The summaries will be used to create a article's recommendation engine.

   4.1 The predicted summaries are converted to embeddings, with which the user can conduct KMeans clustering to create 6 clusters.

   4.2 The 'Pretrained_Text_Summarization.ipynb' notebook exports the 'Summaries.csv' file which contains all the information of 'initial_dataset.csv' along with their predicted summaries and the cluster they belong to.

   4.3 We use the embeddings along with the clusters to identify and recommend the most similar articles to the ones included in file 'Summaries.csv'. The recommendations for each article are stored in 'Recommendations.csv' file.

|--------------------------------------------- APPLICATION -----------------------------------------------|

Back-end

5. To create the database of the app, load the files 'news_articles.sql' and 'news_recommendations.sql' in MySQL Server.

   5.1) The user could run the 'mysql_articles_update.py' file in order to upload any updated 'Summaries.csv' file to the table 'Articles' of our database.

   5.2) The user could runs the 'mysql_recommendations_update.py' file in order to upload any updated 'Recommendations.csv' file to the table 'Recommendations' of our database.

Front-end

6. To run the website the user loads the Front-end files (.php, .html and .css) to a web server. We used XAMPP Control Panel to create a local server and load the files.
   The user runs the 'main.php' to a browser in the adress 'localhost/main.php' in order to enter the web app.

|--------------------------------------------- BUSINESS USE CASE -----------------------------------------------|
The application aims to automate the procedures of articles' summarization and recommendation on a website.
The user is able to read summaries of articles and be recommended other similar articles when clicking on them for further reading, with minimum effort from the website's admin.
