# read_csv.py
import pandas as pd
import json
import sys
from mlxtend.frequent_patterns import association_rules

def asosiasi(min_conf):
    try:
        frequent_itemsets = pd.read_csv('kode_python/support_value.csv')
        frequent_itemsets['itemsets'] = frequent_itemsets['itemsets'].apply(lambda x: frozenset(x.split(', ')))

        # Menghasilkan aturan asosiasi dari itemset yang sering muncul
        rules = association_rules(frequent_itemsets, metric="confidence", min_threshold=min_conf/100, num_itemsets=2)
        rules = rules[['antecedents', 'consequents', 'support', 'confidence', 'lift']]
        rules['antecedents'] = rules['antecedents'].apply(lambda x: ', '.join(list(x)))
        rules['consequents'] = rules['consequents'].apply(lambda x: ', '.join(list(x)))
        rules.sort_values('confidence', ascending=False, inplace=True)
        rules.to_csv('kode_python/aturan_asosiasi.csv', index=True)
        
    except Exception as e:
        print(json.dumps({
            "status": "error",
            "message": str(e)
        }))

if __name__ == "__main__":
    if len(sys.argv) > 1:
        min_conf = float(sys.argv[1])
        asosiasi(min_conf)