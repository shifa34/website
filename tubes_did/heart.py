import joblib
import pandas as pd
from sklearn import preprocessing
from sklearn.preprocessing import MinMaxScaler

model_file = 'model/heart_model_knn.sav'
data_file = pd.read_csv('dataset/heart.csv')
features = data_file.loc[:,'age':'thall'].values

scaler = preprocessing.MinMaxScaler(feature_range=(0,10)).fit(features)
scaled_feature = scaler.transform(features)

loaded_model = joblib.load(model_file)
result = loaded_model.predict(scaled_feature)

hasil = pd.DataFrame(result)
print(hasil)
hasil.to_csv('hasil.csv')