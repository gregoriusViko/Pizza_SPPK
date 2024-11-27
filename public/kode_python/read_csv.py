# read_csv.py
import pandas as pd
import json
import sys

def read_csv(file_path):
    try:
        # Baca CSV menggunakan pandas
        df = pd.read_csv(file_path)
        df = df.head(30)
        
        # Konversi DataFrame ke JSON
        result = {
            "status": "success",
            "data": json.loads(df.to_json(orient='records')),
            "columns": df.columns.tolist(),
            "total_rows": len(df)
        }
        print(json.dumps(result))
        
    except Exception as e:
        print(json.dumps({
            "status": "error",
            "message": str(e)
        }))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        file_path = sys.argv[1]
        read_csv(file_path)