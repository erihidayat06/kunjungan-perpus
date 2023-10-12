 <div class="modal fade" id="edit{{ $kelas->id }}" tabindex="-1">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Vertically Centered</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="/dashboard/ruangan/{{ $kelas->id }}" method="POST">
                     @csrf
                     @method('PUT')
                     <label for="kelas">Nama Kelas</label>
                     <input type="text" id="kelas" name="nama_kelas" class="form-control"
                         placeholder="Contoh : A" value="{{ old('nama_kelas', $kelas) }}">

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save
                     changes</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
