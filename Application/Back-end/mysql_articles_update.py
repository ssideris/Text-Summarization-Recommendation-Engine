import mysql.connector
import pandas as pd

# pip install mysql-connector-python
# creates a connection with the mysql server
conn = mysql.connector.connect(
    host='localhost', user='root', passwd='****', database='news')
myCursor = conn.cursor()


def main():
    # load the news dataset
    dataset = pd.read_csv('Summaries.csv')
    for i in range(len(dataset)):
        publication_number = dataset.iloc[i, 1]
        description = dataset.iloc[i, 2]
        summary = dataset.iloc[i, 4]
        cluster = int(dataset.iloc[i, 5])
        tuple1 = (publication_number, description, summary, cluster)
        # import the dataset to the sql database
        query1 = 'INSERT INTO articles (publication_number,description,summary,cluster) VALUES (%s,%s,%s,%s)'
        myCursor.execute(query1, tuple1)
        conn.commit()


if __name__ == "__main__":
    main()
