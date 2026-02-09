import pandas as pd
import faiss
import numpy as np
import os
import sys
import pickle
from sentence_transformers import SentenceTransformer


print("Loading Embedding Model...")
model = SentenceTransformer('all-MiniLM-L6-v2')

def process_file(file_path, output_dir, usage_type='rag'):
    file_ext = os.path.splitext(file_path)[1].lower()
    file_id = os.path.basename(file_path).split('.')[0]
    
    texts_to_embed = []
    metadata = [] 
    
    if file_ext in ['.csv', '.xlsx']:
        df = pd.read_csv(file_path) if file_ext == '.csv' else pd.read_excel(file_path)
        
        cols = [c.lower() for c in df.columns]
        if 'question' in cols and 'answer' in cols:
            print("Mode: QA Pairs detected.")
            q_col = df.columns[cols.index('question')]
            a_col = df.columns[cols.index('answer')]
            texts_to_embed = df[q_col].astype(str).tolist()
            metadata = df[a_col].astype(str).tolist()
        else:
            print("Mode: Structured Text (Row-by-Row).")
            for _, row in df.iterrows():
                row_text = " ".join(row.astype(str))
                texts_to_embed.append(row_text)
                metadata.append(row_text)

    elif file_ext in ['.txt']:
        print("Mode: Pure Text Chunking.")
        with open(file_path, 'r', encoding='utf-8') as f:
            content = f.read()
            chunk_size = 300
            overlap = 50
            for i in range(0, len(content), chunk_size - overlap):
                chunk = content[i : i + chunk_size]
                texts_to_embed.append(chunk)
                metadata.append(chunk)

    print(f"Generating Embeddings for {len(texts_to_embed)} chunks...")
    embeddings = model.encode(texts_to_embed)
    
    dimension = embeddings.shape[1]
    index = faiss.IndexFlatL2(dimension) 
    index.add(np.array(embeddings).astype('float32'))

    index_file = os.path.join(output_dir, f"{file_id}.index")
    meta_file = os.path.join(output_dir, f"{file_id}_meta.pkl")
    
    faiss.write_index(index, index_file)
    with open(meta_file, 'wb') as f:
        pickle.dump(metadata, f)

    print(f"Success! Index saved to: {index_file}")

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Usage: python rag_processor.py <file_path> <output_dir>")
    else:
        process_file(sys.argv[1], sys.argv[2])