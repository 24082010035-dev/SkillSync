<div style="padding:40px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
    ">

        <div>
            <h1 style="
                color:#2563eb;
                font-size:42px;
                font-weight:700;
                margin:0;
            ">
                Manajemen User
            </h1>

            <p style="
                color:#64748b;
                margin-top:10px;
            ">
                Kelola seluruh akun mahasiswa, mentor, dan admin
            </p>
        </div>

        <div style="
    display:flex;
    gap:12px;
">

    <a href="{{ route('admin.dashboard') }}"
        style="
                background:#64748b;
                color:white;
                padding:14px 24px;
                border-radius:14px;
                text-decoration:none;
                font-weight:600;
                box-shadow:0 4px 10px rgba(100,116,139,.3);
        ">
            ← Dashboard
        </a>

        <a href="{{ route('users.create') }}"
        style="
                background:#3b82f6;
                color:white;
                padding:14px 24px;
                border-radius:14px;
                text-decoration:none;
                font-weight:600;
                box-shadow:0 4px 10px rgba(59,130,246,.3);
        ">
            + Tambah User
        </a>

    </div>
    </div>

    <div style="
        background:white;
        border-radius:24px;
        overflow:hidden;
        box-shadow:0 2px 10px rgba(0,0,0,.08);
    ">

        <table style="
            width:100%;
            border-collapse:collapse;
        ">

            <thead>

                <tr style="
                    background:linear-gradient(90deg,#3b82f6,#4f7df3);
                    color:white;
                ">
                    <th style="padding:20px;text-align:left;">ID</th>
                    <th style="padding:20px;text-align:left;">Nama</th>
                    <th style="padding:20px;text-align:left;">Email</th>
                    <th style="padding:20px;text-align:left;">Role</th>
                    <th style="padding:20px;text-align:center;">Aksi</th>
                </tr>

            </thead>

            <tbody>

            @foreach($users as $user)

                <tr style="border-bottom:1px solid #e5e7eb;">

                    <td style="padding:18px;">
                        {{ $user->id }}
                    </td>

                    <td style="padding:18px;font-weight:600;">
                        {{ $user->nama }}
                    </td>

                    <td style="padding:18px;">
                        {{ $user->email }}
                    </td>

                    <td style="padding:18px;">

                        @if($user->role == 'admin')

                            <span style="
                                background:#fee2e2;
                                color:#dc2626;
                                padding:8px 14px;
                                border-radius:20px;
                                font-weight:600;
                            ">
                                Admin
                            </span>

                        @elseif($user->role == 'mentor')

                            <span style="
                                background:#dcfce7;
                                color:#16a34a;
                                padding:8px 14px;
                                border-radius:20px;
                                font-weight:600;
                            ">
                                Mentor
                            </span>

                        @else

                            <span style="
                                background:#dbeafe;
                                color:#2563eb;
                                padding:8px 14px;
                                border-radius:20px;
                                font-weight:600;
                            ">
                                Mahasiswa
                            </span>

                        @endif

                    </td>

                    <td style="padding:18px;text-align:center;">

                        <a href="{{ route('users.edit',$user->id) }}"
                           style="
                                background:#facc15;
                                color:white;
                                padding:10px 16px;
                                border-radius:10px;
                                text-decoration:none;
                                font-weight:600;
                           ">
                            Edit
                        </a>

                        <form action="{{ route('users.destroy',$user->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    style="
                                        background:#ef4444;
                                        color:white;
                                        border:none;
                                        padding:10px 16px;
                                        border-radius:10px;
                                        font-weight:600;
                                        cursor:pointer;
                                        margin-left:5px;
                                    ">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>