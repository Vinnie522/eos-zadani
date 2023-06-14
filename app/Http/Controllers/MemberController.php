<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;
use Exception;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return MemberResource::collection($members);
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'jmeno' => 'required|alpha|max:255',
                'prijmeni' => 'required|alpha|max:255',
                'email' => 'required|email',
                'narozeni' => 'required|date',
            ]);
            $member = Member::create($validatedData);
            $tagId = $request->validate(['tag_id' => 'required|integer']);
            $member->tags()->attach($tagId);
            return response()->json([
                'message' => 'Člen byl úspěšně vytvořen.',
                'data' => $member
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Nastala chyba při vytváření člena.',
            ]);
        }
    }



   /* public function show($id)
    {
        try {
            $member = Member::findOrFail($id);
            return new MemberResource($member);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Nebyl nalezen žádný člen'
            ], 500);
        }

    } */
    public function show($id)
    {

        $member = Member::find($id);

        if (!$member) {

            return response()->json(['error' => 'Člen nebyl nalezen.'], 404);
        }


        $tags = $member->tags;

        return response()->json(['member' => $member, 'tags' => $tags], 200);
    }
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'jmeno' => 'required|alpha|max:255',
            'prijmeni' => 'required|alpha|max:255',
            'email' => 'required|email',
            'narozeni' => 'required'
        ]);


        $member = Member::findOrFail($id);
        $member->update($validatedData);


        return response()->json($member, 200);
    }
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(null, 204);
    }
    public function add(Request $request, $id)
    {

        $member = Member::find($id);
        if (!$member) {

            return response()->json(['error' => 'Člen nebyl nalezen.'], 404);
        }
        $validatedData = $request->validate([
            'tag_id' => 'required|integer'
        ]);
        $tagId = $validatedData;
        if ($member->tags()->where('tag_id', $tagId)->exists()) {
            return response()->json([
                'message' => 'Stejný zápis již existuje ve spojovací tabulce.',
            ], 400);
        }

        $member->tags()->attach($tagId);
        return response()->json([
            'message' => 'Štítek byl úspěšně přidán k členovi',
         ]);
    }

}
