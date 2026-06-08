<div style="padding:40px;">

    <div style="margin-bottom:30px;">
        <h1 style="
            color:#2563eb;
            font-size:42px;
            font-weight:700;
            margin:0;
        ">
            Tambah User
        </h1>

        <p style="
            color:#64748b;
            margin-top:10px;
        ">
            Tambahkan akun baru untuk mahasiswa, mentor, atau admin
        </p>
    </div>

    <div style="
        background:white;
        border-radius:24px;
        padding:35px;
        box-shadow:0 2px 10px rgba(0,0,0,.08);
        max-width:700px;
    ">

        <form action="{{ route('users.store') }}" method="POST">

            @csrf

            <div style="margin-bottom:20px;">
                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                ">
                    Nama
                </label>

                <input type="text"
                       name="nama"
                       required
                       style="
                            width:100%;
                            padding:12px;
                            border:1px solid #d1d5db;
                            border-radius:10px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                ">
                    Email
                </label>

                <input type="email"
                       name="email"
                       required
                       style="
                            width:100%;
                            padding:12px;
                            border:1px solid #d1d5db;
                            border-radius:10px;
                       ">
            </div>

            <div style="margin-bottom:20px;">
                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                ">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       style="
                            width:100%;
                            padding:12px;
                            border:1px solid #d1d5db;
                            border-radius:10px;
                       ">
            </div>

            <div style="margin-bottom:30px;">
                <label style="
                    display:block;
                    margin-bottom:8px;
                    font-weight:600;
                ">
                    Role
                </label>

                <select name="role"
                        style="
                            width:100%;
                            padding:12px;
                            border:1px solid #d1d5db;
                            border-radius:10px;
                        ">

                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="mentor">Mentor</option>
                    <option value="admin">Admin</option>

                </select>
            </div>

            <div style="
                display:flex;
                gap:10px;
            ">

                <a href="{{ route('users.index') }}"
                   style="
                        background:#94a3b8;
                        color:white;
                        padding:12px 20px;
                        border-radius:10px;
                        text-decoration:none;
                        font-weight:600;
                   ">
                    Kembali
                </a>

                <button type="submit"
                        style="
                            background:#3b82f6;
                            color:white;
                            border:none;
                            padding:12px 20px;
                            border-radius:10px;
                            cursor:pointer;
                            font-weight:600;
                        ">
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</div>