import sys
import faiss
import pickle
import numpy as np
from sentence_transformers import SentenceTransformer

model = SentenceTransformer('all-MiniLM-L6-v2')

def search_rag(query, index_path, meta_path, top_k=3):
    index = faiss.read_index(index_path)
    with open(meta_path, 'rb') as f:
        metadata = pickle.load(f)

    query_vector = model.encode([query]).astype('float32')

    distances, indices = index.search(query_vector, top_k)

    results = []
    for idx in indices[0]:
        if idx != -1: 
            results.append(metadata[idx])
    
    return results

if __name__ == "__main__":
    query_text = sys.argv[1]
    idx_p = sys.argv[2]
    met_p = sys.argv[3]
    
    found_context = search_rag(query_text, idx_p, met_p)
    
    print("---CONTEXT_START---")
    print("\n".join(found_context))
    print("---CONTEXT_END---")