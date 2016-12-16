#include<iostream>
#include<vector>
#include<cstring>
using namespace std;
/// 291399

int a[1024][1024], k, l, r, br, all;
int b[1024][2];

void read()
{
    int i,j,x,y;
    cin>>k>>l>>r; all=k*l; ///cout<<"All: "<<all<<endl;

    cin>>x>>y; a[k-x][y-1]=1; br++;
    cin>>x>>y; a[k-x][y-1]=1; br++;
}

void update (int x, int y)
{
    if (!a[x-1][y] && (x-1 >= 0)) {a[x-1][y]=1;br++;}
    if (!a[x][y-1] && (y-1 >= 0)) {a[x][y-1]=1;br++;}
    if (!a[x+1][y] && (x+1 < k)) {a[x+1][y]=1;br++;}
    if (!a[x][y+1] && (y+1 < l)) {a[x][y+1]=1;br++;}
    a[x][y]=2;
}

int main()
{
    int q,i,j,pos=0;
    read();
    for (q=0;q<r;q++)
    {
        for (i=0;i<k;i++)
            for (j=0;j<l;j++)
                if (a[i][j]==1) {pos++;b[pos][0]=i;b[pos][1]=j;}

        for (int w=1;w<=pos;w++) update(b[w][0], b[w][1]);
        memset (b, 0, sizeof(b));pos=0;

      ///  cout<< "Day "<<q<<" BR = "<<br<<endl;
    }
    cout<<all-br<<endl;
    return 0;

}

